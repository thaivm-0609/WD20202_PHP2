<div>
    <form action="/signup" method="POST">
        @if (!empty($_SESSION['errors'])) 
            <div class="alert alert-danger">
                <ul>
                    @foreach ($_SESSION['errors'] as $err) 
                        <li>{{ $err }}</li>
                    @endforeach
                </ul>
            </div>

            @php
                unset($_SESSION['errors']);
            @endphp
        @endif
        <div>
            <label for="">Email</label>
            <input type="email" name="email">
        </div>
        <div>
            <label for="">Password</label>
            <input type="password" name="password">
        </div>
        <button type="submit">Đăng ký</button>
    </form>
</div>