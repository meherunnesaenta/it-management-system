@if(session('status'))
    <div class="alert alert-info mb-4">
        <div>{{ session('status') }}</div>
    </div>
@endif
