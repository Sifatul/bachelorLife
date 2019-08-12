

Dear <strong>{{ $name }}</strong>, 
<div>
    We are sorry to know that you lost your password!
</div>  
<div>
    But don’t worry! You can use the following link to reset your password:
</div>
<a href="{{ $link }}">{{ $link }}</a>
<div>
    If you don’t use this link within 2 hours, it will expire. To get a new password reset link, please visit {{ $login_link }}
</div>
<div>
    Thanks,
</div>
Your friends at BachelorLife.