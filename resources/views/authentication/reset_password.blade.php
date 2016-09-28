  <div>

    <h1>Hai {{$email}} </h1>

    <h3>Someone has request for reset password, if don't disobey this email.</h3>

    <p>

    To reset your password follow this link : {!! link_to('change-password/'.$forgot_token, 'Change Password') !!}

    </p>

  </div>