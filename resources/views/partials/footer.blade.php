<footer class="bg-neutral-900 pt-10 text-sm text-neutral-300">
    <div class="container-page grid gap-8 sm:grid-cols-3">
        <div>
            <h3 class="mb-3 font-semibold text-white">Contact us</h3>
            <p>📞 0812-0000-0000</p>
            <p class="mt-1">✉️ laundrycare@gmail.com</p>
        </div>

        <div>
            <h3 class="mb-3 font-semibold text-white">Social media</h3>
            <ul class="space-y-1">
                <li><a href="#" class="hover:text-white">Instagram</a></li>
                <li><a href="#" class="hover:text-white">TikTok</a></li>
                <li><a href="#" class="hover:text-white">WhatsApp</a></li>
            </ul>
        </div>

        <div>
            <h3 class="mb-3 font-semibold text-white">Site map</h3>
            <ul class="space-y-1">
                <li><a href="{{ route('home') }}" class="hover:text-white">Home</a></li>
                <li><a href="{{ route('program') }}" class="hover:text-white">Program</a></li>
                <li><a href="{{ route('contact') }}" class="hover:text-white">Contact Us</a></li>
            </ul>
        </div>
    </div>

    <div class="mt-8 border-t border-white/10 py-4 text-center text-xs text-neutral-400">
        &copy; {{ date('Y') }} Laundrycare Project. All Rights Reserved.
    </div>
</footer>