<!doctype html>
<html>
<head><meta charset="utf-8"></head>
<body>
  <h3>Pesan dari Website</h3>
  <p><strong>Nama:</strong> {{ $data['name'] }}</p>
  <p><strong>Email:</strong> {{ $data['email'] }}</p>
  @if(!empty($data['company'])) <p><strong>Perusahaan:</strong> {{ $data['company'] }}</p> @endif
  <p><strong>Pesan:</strong></p>
  <p>{!! nl2br(e($data['message'])) !!}</p>
  <hr>
  <p>IP: {{ $data['ip'] ?? 'n/a' }}</p>
  <p>User Agent: {{ $data['user_agent'] ?? 'n/a' }}</p>
</body>
</html>
