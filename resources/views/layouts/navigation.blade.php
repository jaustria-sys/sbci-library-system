<nav style="background:#0B2C6F; border-bottom:4px solid #FFC107; padding:15px;">
    <div style="max-width:1200px; margin:0 auto; display:flex; justify-content:space-between; align-items:center;">
        <div style="display:flex; gap:20px; align-items:center;">
            <a href="/dashboard" style="color:white; font-weight:bold; font-size:20px; text-decoration:none;">SBCI Library</a>
            <a href="/dashboard" style="color:white; text-decoration:none;">Dashboard</a>
            <a href="/books" style="color:#FFC107; font-weight:bold; text-decoration:none; border-bottom:2px solid #FFC107;">Books</a>
        </div>
        <div style="display:flex; gap:15px; align-items:center;">
            <span style="color:white;">{{ Auth::user()->name ?? 'rex' }}</span>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" style="background:#dc2626; color:white; font-weight:bold; padding:8px 16px; border-radius:8px; border:none; cursor:pointer;">
                    Log Out
                </button>
            </form>
        </div>
    </div>
</nav>