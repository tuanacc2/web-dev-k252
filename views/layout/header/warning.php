<div x-data="{ 
        show: false, 
        message: '' 
    }" 
    x-init="
        if (localStorage.getItem('warning_user')) {
            message = localStorage.getItem('warning_user');
            show = true;
            localStorage.removeItem('warning_user'); // Delete it so it only shows ONCE
            
            // Auto-hide after 5 seconds
            setTimeout(() => show = false, 5000);
        }
    "
    x-show="show"
    x-transition
    class="fixed bottom-5 right-5 z-50 bg-green-600 text-white px-6 py-3 rounded-lg shadow-2xl flex items-center space-x-3"
    style="display: none;"
>
    <i class="fa-solid fa-check-circle"></i>
    <span x-text="message"></span>
    <button @click="show = false" class="ml-4 text-white/70 hover:text-white">
        <i class="fa-solid fa-xmark"></i>
    </button>
</div>