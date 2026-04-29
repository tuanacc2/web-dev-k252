document.addEventListener("DOMContentLoaded", function () {
    const form = document.getElementById("contact-form");
    if (!form) return;
    form.addEventListener("submit", async function (e) {
        e.preventDefault();
        // clear error
        setError("err-name", "");
        setError("err-email", "");
        setError("err-phone", "");
        setError("err-question", "");
        const formData = new FormData(form);
        const res = await fetch("?action=contact_store", {
            method: "POST",
            body: formData
        });
        const data = await res.json();
        // ❌ ERROR
        if (data.status === "error") {
            const err = data.errors;
            if (err.name) setError("err-name", err.name);
            if (err.email) setError("err-email", err.email);
            if (err.phoneNumber) setError("err-phone", err.phoneNumber);
            if (err.question) setError("err-question", err.question);
            return;
        }
        // ✅ SUCCESS
        alert("Gửi thành công!");
        form.reset();
    });
    function setError(id, msg) {
        const el = document.getElementById(id);
        if (el) el.innerText = msg;
    }
});