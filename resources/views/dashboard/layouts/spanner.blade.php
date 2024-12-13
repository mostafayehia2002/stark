
@push('css')
    <style>
    .spinner {
    border: 4px solid #f3f3f3;
    border-top: 4px solid #3498db;
    border-radius: 50%;
    width: 40px;
    height: 40px;
    animation: spin 1s linear infinite;
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    z-index: 9999;
    }
    @keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
    }
    </style>
@endpush
<div id="spinner" class="spinner" style="display:none"></div>
@push('js')
    <script>
        document.getElementById('myForm').addEventListener('submit', function(event) {
            event.target.submit();
            document.getElementById('spinner').style.display = 'flex';
        });
    </script>
@endpush
