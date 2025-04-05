@if (session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
  @endif
  @if (session('failure'))
  <div class="alert alert-danger">{{ session('failure') }}</div>
  @endif
