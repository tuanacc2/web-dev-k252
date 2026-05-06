<div id="login-modal"
     class="hidden fixed inset-0 bg-black/50 z-50 flex items-center justify-center"
     onclick="if(event.target.id === 'login-modal') this.classList.add('hidden')">

    <div class=" bg-[#fefbf4] w-[90%] max-w-[500px] p-12 rounded-lg relative">
        
        <button class="absolute top-2 right-3 text-2xl"
                onclick="document.getElementById('login-modal').classList.add('hidden')">
            ✕
        </button>

        <p class="text-[#1f1c17] font-semibold pb-4 mb-4 text-xl"><span>Đăng nhập</span></p>
        <p class="text-[#1f1c17] font-serif py-4 mb-4 text-3xl"><span>Chào mừng bạn trở lại</span></p>
        <p>Bạn chưa có tài khoản? &nbsp;
            <a class="ml-auto clickable-text" href="javascript:void(0)"
                onclick="
                    document.getElementById('login-modal').classList.add('hidden'), 
                    document.getElementById('register-modal').classList.remove('hidden')">
                Tạo tài khoản
            </a>
        </p>

        <form method="POST" action="<?= SITE_URL ?>/auth/login" id="login-form" class="mt-7">
            <div>
                <div class="flex flex-row items-center" style="border-bottom: 1px solid #C5A25D ;">
                    <i class="ti-layers mr-2" style="color: #C5A25D"></i>
                    <input type="text" name="username" id="login-username" placeholder="Nhập tên tài khoản" 
                        class="w-full h-10">
                </div>
                <div id="err-login-username" class="text-red-500 text-sm"></div>
            </div>
            <div class="mt-4">
                <div class="flex flex-row items-center" style="border-bottom: 1px solid #C5A25D ;">
                    <i class="ti-lock mr-2" style="color: #C5A25D"></i>
                    <input type="password" name="password" id="login-password" placeholder="Nhập mật khẩu" 
                        class="w-full h-10">
                </div> 
                <div id="err-login-password" class="text-red-500 text-sm"></div>
            </div>
            <div class="flex flex-row">
                <a class="ml-auto clickable-text p-1" href="javascript:void(0)">
                Quên mật khẩu
                </a> 
            </div>

            <div class="mt-6 flex justify-center">
                <button
                    form="login-form"
                    class=" w-full !bg-[#1f1c17] !text-white !text-xl !px-0 !py-4 !rounded-md
                            hover:!bg-[#2d140d] !transition !duration-300">
                ĐĂNG NHẬP
                </button>
            </div>
        </form>
    </div>
</div>

<script defer>
document.addEventListener("DOMContentLoaded", function () {
    const form = document.getElementById("login-form");
    if (!form) return;
    form.addEventListener("submit", async function (e) {
        e.preventDefault();

        // clear error
        setError("err-login-username", "");
        setError("err-login-password", "");

        // pass value
        const username = getIdValue("login-username");
        const password = getIdValue("login-password");

        // pre-POST validate
        let flag = false;
        if (username === "") {
            setError("err-login-username", "Không được bỏ trống tên tài khoản");
            flag = true;
        }

        if (password === "") {
            setError("err-login-password", "Không được bỏ trống mật khẩu");
            flag = true;
        }

        if (flag) return;

        // post-POST validate
        const formData = new FormData(form);

        const res = await fetch(`<?= SITE_URL ?? "" ?>/auth/login`, {
            method: "POST",
            body: formData
        });
        const data = await res.json();

        if (data.status === "error") {
            const err = data.errors;
            if (err.username) setError("err-login-username", err.username)
            if (err.password) setError("err-login-password", err.password);
            return;
        }
        // ✅ SUCCESS

        localStorage.setItem('warning_user', 'Đăng nhập thành công!');
        form.reset();
        window.location.href = data.redirect || "<?= SITE_URL ?>/homepage";
    });
    function getIdValue(id) {
        const el = document.getElementById(id);
        return el ? el.value : "";
    }
    function setError(id, msg) {
        const el = document.getElementById(id);
        if (el) el.innerText = msg;
    }
});
</script>