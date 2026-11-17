<div class="service-navigation">
    <a href="{{ route('home') }}" class="service-nav-btn">
        <svg viewBox="0 0 24 24" aria-hidden="true">
            <path d="M3 10.5L12 3l9 7.5v9a1 1 0 0 1-1 1h-5v-6h-6v6H4a1 1 0 0 1-1-1z"/>
        </svg>
        <span>Home</span>
    </a>

    <a href="{{ route('daftar-service.index') }}"
       class="service-nav-btn {{ request()->routeIs('daftar-service.index') ? 'active' : '' }}">
        <svg viewBox="0 0 24 24" aria-hidden="true">
            <path d="M5 4h14a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V5a1 1 0 0 1 1-1zm3 4v2h2V8zm4 0v2h5V8zm-4 5v2h2v-2zm4 0v2h5v-2zm-4 5v1h2v-1zm4 0v1h5v-1z"/>
        </svg>
        <span>Daftar Service</span>
    </a>

    <a href="{{ route('daftar-service.create') }}"
       class="service-nav-btn {{ request()->routeIs('daftar-service.create') ? 'active' : '' }}">
        <svg viewBox="0 0 24 24" aria-hidden="true">
            <path d="M12 2a10 10 0 1 0 0 20 10 10 0 0 0 0-20zm1 5v4h4v2h-4v4h-2v-4H7v-2h4V7z"/>
        </svg>
        <span>Tambah Service</span>
    </a>
</div>

@push('styles')
<style>
.service-navigation {
    display: flex;
    align-items: center;
    gap: 12px;
    margin-bottom: 30px;
    justify-content: center;
    flex-wrap: wrap;
}

.service-nav-btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
    padding: 13px 20px;
    background: #101114;
    color: #F5E600;
    border: 1px solid #F5E600;
    border-radius: 9px;
    text-decoration: none;
    font-weight: 700;
    font-size: 14px;
    transition: all .25s ease-in-out;
}

.service-nav-btn svg {
    width: 20px;
    height: 20px;
    fill: currentColor;
    flex-shrink: 0;
}

.service-nav-btn:hover {
    background: #F5E600;
    color: #101114;
    border-color: #F5E600;
    transform: translateY(-4px);
    box-shadow: 0 6px 18px rgba(245,230,0,.25);
}

.service-nav-btn.active,
.service-nav-btn.active:hover {
    background: #F5E600;
    border-color: #F5E600;
    color: #101114;
}

@media(max-width:576px) {
    .service-navigation {
        display: grid;
        grid-template-columns: 1fr;
    }

    .service-nav-btn {
        width: 100%;
    }
}
</style>
@endpush
