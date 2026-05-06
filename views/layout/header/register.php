<div id="register-modal"
     class="hidden fixed inset-0 bg-black/50 z-50 flex items-center justify-center"
     onclick="if(event.target.id === 'register-modal') this.classList.add('hidden')">
    <div class=" bg-[#fefbf4] w-[90%] max-w-[500px] p-12 rounded-lg relative">
        <button class="absolute top-2 right-3 text-2xl"
                onclick="document.getElementById('register-modal').classList.add('hidden')">
            ✕
        </button>
        <p class="text-[#1f1c17] font-semibold pb-4 mb-4 text-xl">
            <a  class="text-2xl"
                href="javascript:void(0)"
                onclick="
                    document.getElementById('register-modal').classList.add('hidden'), 
                    document.getElementById('login-modal').classList.remove('hidden')">
                ←
            </a>
            <span>Đăng ký</span>
        </p>
        <p class="text-[#1f1c17] font-serif py-4 mb-4 text-3xl"><span>Tạo tài khoản</span></p>
        <form method="POST" action="<?= SITE_URL ?>/auth/register" id="register-form" class="mt-7">
            <div>
                <div class="flex flex-row items-center" style="border-bottom: 1px solid #C5A25D ;">
                    <i class="ti-layers mr-2" style="color: #C5A25D"></i>
                    <input type="text" name="username" id="register-username"placeholder="Nhập tên tài khoản *" 
                        class="w-full h-10">
                </div>
                <div id="err-register-username" class="text-red-500 text-sm"></div>
            </div>
            <div class="mt-4 flex flex-row items-center justify-between">
                <div>
                    <div class="flex flex-row items-center" style="border-bottom: 1px solid #C5A25D ;">
                        <i class="ti-user mr-2" style="color: #C5A25D"></i>
                        <input type="text" name="lastname" id="register-lastname" placeholder="Nhập họ *" class="w-full h-10 p-2 ">
                    </div>
                    <div id="err-register-lastname" class="text-red-500 text-sm"></div>
                </div>
                <div>
                    <input type="text" name="firstname" id='register-firstname' placeholder="Nhập tên *" class="w-full h-10 p-2 " style="border-bottom: 1px solid #C5A25D ;">
                    <div id="err-register-firstname" class="text-red-500 text-sm"></div>
                </div>
            </div>
            <div class="mt-4">
                <div class="flex flex-row items-center" style="border-bottom: 1px solid #C5A25D ;">
                    <i class="ti-lock mr-2" style="color: #C5A25D"></i>
                    <input type="password" name="password" id='register-password' placeholder="Nhập mật khẩu *" 
                        class="w-full h-10">
                </div>
                <div id="err-register-password" class="text-red-500 text-sm"></div>
            </div>
            <div class="mt-4">
                <div class="flex flex-row items-center" style="border-bottom: 1px solid #C5A25D ;">
                    <i class="ti-email mr-2" style="color: #C5A25D"></i>
                    <input type="text" name="email" id='register-email' placeholder="Nhập email *" class="w-full h-10 p-2">
                </div>
                <div id="err-register-email" class="text-red-500 text-sm"></div>
            </div>
            <div class="mt-4">
                <div class="flex flex-row items-center" style="border-bottom: 1px solid #C5A25D ;">
                    <i class="ti-mobile mr-2" style="color: #C5A25D"></i>
                    <input type="tel" name="phone" id='register-phone' placeholder="Nhập số điện thoại *" class="w-full h-10 p-2 ">
                </div>
                <div id="err-register-phone" class="text-red-500 text-sm"></div>
            </div>
            <div class="mt-4">
                <div class="flex flex-row items-center" style="border-bottom: 1px solid #C5A25D ;">
                    <i class="ti-home mr-2" style="color: #C5A25D"></i>
                    <input type="text" name="address" id='register-address' placeholder="Nhập địa chỉ (có thể thêm sau)" class="w-full h-10 p-2 ">
                </div>
                <div id="err-register-address" class="text-red-500 text-sm"></div>
            </div>

            <div class="mt-6 flex justify-center">
                <button
                    form="register-form"
                    class=" w-full !bg-[#1f1c17] !text-white !text-xl !px-0 !py-4 !rounded-md
                            hover:!bg-[#2d140d] !transition !duration-300">
                ĐĂNG KÝ
                </button>
            </div>
        </form>
    </div>
</div>

<script defer>
document.addEventListener("DOMContentLoaded", function () {
    const form = document.getElementById("register-form");
    if (!form) return;
    form.addEventListener("submit", async function (e) {
        e.preventDefault();

        // clear error
        setError("err-register-username", "");
        setError("err-register-lastname", "");
        setError("err-register-firstname", "");
        setError("err-register-password", "");
        setError("err-register-email", "");
        setError("err-register-phone", "");
        setError("err-register-address", "");

        // pass value
        const username = getIdValue("register-username");
        const lastname = getIdValue("register-lastname");
        const firstname = getIdValue("register-firstname");
        const password = getIdValue("register-password");
        const email = getIdValue("register-email");
        const phone = getIdValue("register-phone");
        const address = getIdValue("register-address");

        console.log(username, password);
        // pre-POST validate
        let flag = false;
        if (username === "") {
            setError("err-register-username", "Không được bỏ trống tên tài khoản");
            flag = true;
        }

        if (lastname === "") {
            setError("err-register-lastname", "Không được bỏ trống họ");
            flag = true;
        }

        if (firstname === "") {
            setError("err-register-firstname", lastname === "" ? "...và tên" : "Không được bỏ trống tên");
            flag = true;
        }

        if (password === "") {
            setError("err-register-password", "Không được bỏ trống mật khẩu");
            flag = true;
        }

        if (email === "") {
            setError("err-register-email", "Không được bỏ trống email");
            flag = true;
        } else if (!/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{1,}$/.test(email)) {
            setError("err-register-email", "Sai định dạng email");
            flag = true;
        }

        if (phone === "") {
            setError("err-register-phone", "Không được bỏ trống SĐT");
            flag = true;
        } else if (!/^[+]*[(]{0,1}[0-9]{1,4}[)]{0,1}[-\s\./0-9]*$/g.test(phone)) {
            setError("err-register-phone", "Sai định dạng SĐT");
            flag = true;
        }
        
        //if (address === "") {
        //    setError("err-register-address", "Không được bỏ trống địa chỉ");
        //    flag = true;
        //}


        if (flag) return;

        // post-POST validate
        const formData = new FormData(form);

        const res = await fetch(`<?= SITE_URL ?? "" ?>/auth/register`, {
            method: "POST",
            body: formData
        });
        const data = await res.json();

        if (data.status === "error") {
            const err = data.errors;
            if (err.username) setError("err-register-username", err.username); 
            if (err.lastname) setError("err-register-lastname", err.lastname);
            if (err.firstname) setError("err-register-firstname", err.firstname);
            if (err.password) setError("err-register-password", err.password);
            if (err.email) setError("err-register-email", err.email);
            if (err.phone) setError("err-register-phone", err.phone);
            if (err.address) setError("err-register-address", err.address);

            return;
        }
        // ✅ SUCCESS

        localStorage.setItem('warning_user', 'Đăng ký thành công!');
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