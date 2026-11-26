document.addEventListener("DOMContentLoaded", function () {
    const form = document.getElementById("registrationForm");
    if (!form) return;

    const token = document.querySelector('meta[name="csrf-token"]').content;
    const payBtn = form.querySelector(".pay-btn");
    const processBox = document.getElementById("paymentProcess");
    const payLabel = payBtn ? payBtn.innerHTML : "";
    let busy = false;
    let paid = false;

    function lockPay() {
        if (!payBtn) return;
        payBtn.disabled = true;
        payBtn.innerHTML = 'Processing <i class="fa-solid fa-spinner fa-spin"></i>';
    }

    function showProcess() {
        if (!processBox) return;
        processBox.hidden = false;
        processBox.classList.add("is-open");
    }

    function hideProcess() {
        if (!processBox) return;
        processBox.hidden = true;
        processBox.classList.remove("is-open");
    }

    function unlock() {
        if (paid) return;
        busy = false;
        hideProcess();
        if (!payBtn) return;
        payBtn.disabled = false;
        payBtn.innerHTML = payLabel;
    }

    form.addEventListener("submit", async function (e) {
        e.preventDefault();
        e.stopImmediatePropagation();

        if (busy) return;
        busy = true;

        const interests = form.querySelectorAll('input[name="areas_of_interest[]"]:checked');
        if (!interests.length) {
            alert("Please select at least one area of interest.");
            unlock();
            return;
        }

        if (!form.checkValidity()) {
            form.reportValidity();
            unlock();
            return;
        }

        lockPay();
        showProcess();

        try {
            const response = await fetch(form.action, {
                method: "POST",
                headers: {
                    "X-CSRF-TOKEN": token,
                    "Accept": "application/json",
                    "X-Requested-With": "XMLHttpRequest",
                },
                body: new FormData(form),
            });

            const data = await response.json();

            if (!response.ok) {
                let message = data.message || "Please check the form and try again.";
                if (data.errors) {
                    message = Object.values(data.errors).flat().join("\n");
                }
                alert(message);
                unlock();
                return;
            }

            const checkout = new Razorpay({
                key: data.key,
                amount: data.amount,
                currency: "INR",
                name: "Iraaya World",
                description: "Membership (incl. GST)",
                order_id: data.order_id,
                prefill: {
                    name: data.name,
                    email: data.email,
                    contact: data.contact,
                },
                theme: { color: "#cf2030" },
                modal: {
                    ondismiss: function () {
                        if (paid) {
                            showProcess();
                            return;
                        }
                        unlock();
                    }
                },
                handler: async function (payment) {
                    paid = true;
                    lockPay();
                    showProcess();

                    try {
                        const verify = await fetch(form.dataset.verify, {
                            method: "POST",
                            headers: {
                                "Content-Type": "application/json",
                                "X-CSRF-TOKEN": token,
                                "Accept": "application/json",
                                "X-Requested-With": "XMLHttpRequest",
                            },
                            body: JSON.stringify(payment),
                        });

                        const result = await verify.json();

                        if (!verify.ok) {
                            paid = false;
                            alert(result.message || "Payment could not be verified.");
                            unlock();
                            return;
                        }

                        if (typeof fbq !== "undefined") {
                            fbq("track", "Lead");
                        }

                        window.location.replace(result.redirect);
                    } catch (err) {
                        paid = false;
                        alert("Payment received, but confirmation failed. Please contact us.");
                        unlock();
                    }
                },
            });

            checkout.on("payment.failed", function () {
                if (paid) return;
                alert("Payment failed. You can try again.");
                unlock();
            });

            checkout.open();
        } catch (error) {
            alert("Something went wrong. Please try again.");
            unlock();
        }
    }, true);
});
