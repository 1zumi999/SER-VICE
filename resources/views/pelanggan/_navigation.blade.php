<div class="customer-navigation">
    <a href="{{ route('home') }}" class="customer-nav-btn">
        <svg viewBox="0 0 24 24" aria-hidden="true">
            <path d="M3 10.5L12 3l9 7.5v9a1 1 0 0 1-1 1h-5v-6h-6v6H4a1 1 0 0 1-1-1z"/>
        </svg>
        <span>Home</span>
    </a>

    <a href="{{ route('pelanggan.index') }}"
       class="customer-nav-btn {{ request()->routeIs('pelanggan.index') ? 'active' : '' }}">
        <svg viewBox="0 0 24 24" aria-hidden="true">
            <path d="M5 4h14a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V5a1 1 0 0 1 1-1zm3 4v2h2V8zm4 0v2h5V8zm-4 5v2h2v-2zm4 0v2h5v-2zm-4 5v1h2v-1zm4 0v1h5v-1z"/>
        </svg>
        <span>Daftar Pelanggan</span>
    </a>

    <a href="{{ route('pelanggan.create') }}"
       class="customer-nav-btn {{ request()->routeIs('pelanggan.create') ? 'active' : '' }}">
        <svg viewBox="0 0 24 24" aria-hidden="true">
            <path d="M12 2a10 10 0 1 0 0 20 10 10 0 0 0 0-20zm1 5v4h4v2h-4v4h-2v-4H7v-2h4V7z"/>
        </svg>
        <span>Tambah Pelanggan</span>
    </a>
</div>

@push('styles')
<style>
.customer-navigation {
    display: flex;
    align-items: center;
    gap: 12px;
    margin-bottom: 30px;
    justify-content: center;
    flex-wrap: wrap;
}

.customer-nav-btn {
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
    transition: background .2s ease, color .2s ease;
}

.customer-nav-btn svg {
    width: 20px;
    height: 20px;
    fill: currentColor;
    flex-shrink: 0;
}

.customer-nav-btn:hover {
    background: #F5E600;
    color: #101114;
    border-color: #FFFFFF;
}

.customer-nav-btn.active,
.customer-nav-btn.active:hover {
    background: #F5E600;
    border-color: #F5E600;
    color: #101114;
}

.customer-nav-btn.active svg {
    fill: #101114;
}

@media(max-width: 576px) {
    .customer-navigation {
        display: grid;
        grid-template-columns: 1fr;
    }

    .customer-nav-btn {
        width: 100%;
    }
}
</style>
@endpush



<style>

/* Efek hover tombol navigasi */
.customer-nav-btn {
    background: #101114;
    color: #F5E600;
    border: 1px solid #F5E600;
    transition: all 0.25s ease-in-out;
    transform: translateY(0);
    box-shadow: 0 0 0 transparent;
}

.customer-nav-btn:hover {
    background: #F5E600 !important;
    color: #101114 !important;
    border-color: #F5E600 !important;
    transform: translateY(-4px);
    box-shadow: 0 6px 18px rgba(245, 230, 0, 0.25);
}

.customer-nav-btn:hover svg {
    fill: #101114 !important;
}

.customer-nav-btn.active,
.customer-nav-btn.active:hover {
    background: #F5E600 !important;
    color: #101114 !important;
    border-color: #F5E600 !important;
}

.customer-nav-btn.active svg {
    fill: #101114 !important;
}
</style>
