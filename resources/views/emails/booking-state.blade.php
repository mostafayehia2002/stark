<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() == 'en' ? 'ltr' : 'rtl' }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ env('app_name') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            padding: 60px 30px;
            color: #333;
        }
        .card {
            border-radius: 15px;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
            background-color: #ffffff;
            overflow: hidden;
        }
        .card-header {
            background-color: #007bff;
            color: #fff;
            border-radius: 15px 15px 0 0;
            padding: 30px;
            text-align: center;
        }
        .card-header h2 {
            font-size: 2.5rem;
        }
        .card-body {
            padding: 30px;
            font-size: 1.2rem;
        }
        .details-section {
            background-color: #f9f9f9;
            padding: 20px;
            margin-top: 30px;
            border-radius: 10px;
            font-size: 1.1rem;
        }
        .header-text {
            font-size: 1.3rem;
            color: #555;
            margin-bottom: 20px;
        }
        .btn-link {
            color: #007bff;
            text-decoration: none;
            font-weight: 600;
            font-size: 1.1rem;
        }
        .btn-link:hover {
            color: #0056b3;
            text-decoration: underline;
        }
        .footer-text {
            color: #777;
            font-size: 1rem;
        }
        .text-center {
            margin-top: 40px;
        }
        ul li {
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <h2>{{ trans('dashboard.booking_information') }}</h2>
                </div>
                <div class="card-body">
                    <p class="header-text">{{ translate_message('hello') }}: <strong>{{ $userName }}</strong>,</p>
                    <p>{{ translate_message('booking_status_updated') }}: <strong>{{ translate_enums($bookingStatus) }}</strong>.</p>
                    <div class="details-section">
                        <h5>{{ trans('dashboard.booking_information') }}:</h5>
                        <ul class="list-unstyled">
                            <li><strong>{{ trans('label.booking_id') }}:</strong> {{ $bookingId }}</li>
                            <li><strong>{{ trans('label.booking_date') }}:</strong> {{ $bookingDate }}</li>
                            <li><strong>{{ trans('label.unit_title') }}:</strong> {{ $unitTitle }}</li>
                            <li><strong>{{ trans('label.address') }}:</strong> {{ $bookingLocation }}</li>
                        </ul>
                    </div>
                    <div class="text-center">
                        <a href="{{ url('/booking-details/' . $bookingId) }}" class="btn-link" target="_blank">{{ translate_message('view_details_on_website') }}</a>
                    </div>
                </div>
                <div class="card-footer text-center footer-text">
                    <small>{{ translate_message('have_question') }} <a href="mailto:{{ app('settings')->getValue('general', 'support_email') }}">{{ app('settings')->getValue('general', 'support_email') }}</a></small>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
