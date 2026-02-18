<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>2FA Verification - AMS Admin</title>
  <link href="<?php echo e(asset('assets/vendor/bootstrap/css/bootstrap.min.css')); ?>" rel="stylesheet">
  <link href="<?php echo e(asset('assets/vendor/bootstrap-icons/bootstrap-icons.css')); ?>" rel="stylesheet">
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .login-page {
      width: 100%;
      max-width: 400px;
    }

    .login-container {
      background: white;
      border-radius: 10px;
      box-shadow: 0 10px 40px rgba(0, 0, 0, 0.2);
      overflow: hidden;
    }

    .login-header {
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      color: white;
      padding: 30px;
      text-align: center;
    }

    .login-header h1 {
      font-size: 28px;
      font-weight: 700;
      margin-bottom: 10px;
    }

    .login-header p {
      font-size: 14px;
      opacity: 0.9;
      margin: 0;
    }

    .login-body {
      padding: 30px;
    }

    .form-group {
      margin-bottom: 20px;
    }

    .form-group label {
      font-weight: 500;
      margin-bottom: 8px;
      display: block;
      color: #333;
    }

    .form-control {
      border: 1px solid #ddd;
      padding: 12px;
      font-size: 16px;
      border-radius: 5px;
      transition: border-color 0.3s;
    }

    .form-control:focus {
      border-color: #667eea;
      outline: none;
      box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
    }

    .form-control.is-invalid {
      border-color: #dc3545;
    }

    .invalid-feedback {
      color: #dc3545;
      font-size: 12px;
      margin-top: 5px;
      display: block;
    }

    .btn-login {
      width: 100%;
      padding: 12px;
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      color: white;
      border: none;
      border-radius: 5px;
      font-weight: 600;
      font-size: 16px;
      cursor: pointer;
      transition: transform 0.2s, box-shadow 0.2s;
    }

    .btn-login:hover {
      transform: translateY(-2px);
      box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
    }

    .login-footer {
      text-align: center;
      padding: 20px 30px;
      border-top: 1px solid #eee;
      font-size: 13px;
      color: #666;
    }

    .login-footer a {
      color: #667eea;
      text-decoration: none;
      font-weight: 600;
    }

    .login-footer a:hover {
      text-decoration: underline;
    }

    .alert {
      margin-bottom: 20px;
      border-radius: 5px;
      padding: 12px 15px;
      font-size: 13px;
    }

    .alert-danger {
      background-color: #f8d7da;
      color: #721c24;
      border: 1px solid #f5c6cb;
    }

    .alert-info {
      background-color: #d1ecf1;
      color: #0c5460;
      border: 1px solid #bee5eb;
    }

    .code-input {
      text-align: center;
      font-size: 24px;
      letter-spacing: 8px;
      font-weight: 600;
      font-family: 'Courier New', monospace;
    }

    .info-box {
      background-color: #e7f3ff;
      border-left: 4px solid #007bff;
      padding: 15px;
      border-radius: 4px;
      margin-bottom: 20px;
      font-size: 13px;
      color: #004085;
    }

    .info-box strong {
      display: block;
      margin-bottom: 5px;
    }

    .back-link {
      text-align: center;
      margin-top: 15px;
    }

    .back-link a {
      color: #667eea;
      text-decoration: none;
      font-size: 13px;
      font-weight: 600;
    }

    .back-link a:hover {
      text-decoration: underline;
    }
  </style>
</head>

<body>

  <div class="login-page">
    <div class="login-container">
      <div class="login-header">
        <h1><i class="bi bi-shield-check"></i></h1>
        <h1>2FA Verification</h1>
        <p>Enter the code from your authenticator app</p>
      </div>

      <div class="login-body">
        <?php if($errors->any()): ?>
        <div class="alert alert-danger">
          <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <div>
            <i class="bi bi-exclamation-circle"></i> <?php echo e($error); ?>

          </div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <?php endif; ?>

        <div class="info-box">
          <strong><i class="bi bi-info-circle"></i> 6-Digit Code</strong>
          Open your authenticator app (Google Authenticator, Microsoft Authenticator, Authy, etc.) and enter the 6-digit code below.
        </div>

        <form method="POST" action="<?php echo e(route('login.verify2fa')); ?>">
          <?php echo csrf_field(); ?>
          <div class="form-group">
            <label for="code">Verification Code</label>
            <input 
              type="text" 
              id="code" 
              name="code" 
              class="form-control code-input <?php $__errorArgs = ['code'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
              placeholder="000000"
              maxlength="6"
              inputmode="numeric"
              pattern="[0-9]{6}"
              required
              autofocus
            >
            <?php $__errorArgs = ['code'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="invalid-feedback"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
          </div>

          <button type="submit" class="btn-login">
            <i class="bi bi-check-circle"></i> Verify Code
          </button>
        </form>

        <div class="back-link">
          <a href="<?php echo e(route('login')); ?>">
            <i class="bi bi-arrow-left"></i> Back to Login
          </a>
        </div>
      </div>

      <div class="login-footer">
        Code refreshes every 30 seconds. If code expires, wait for a new one in your app.
      </div>
    </div>
  </div>

  <script src="<?php echo e(asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>
  <script>
    // Auto-focus and handle numeric input
    const codeInput = document.getElementById('code');
    
    codeInput.addEventListener('input', function(e) {
      // Remove non-numeric characters
      this.value = this.value.replace(/[^0-9]/g, '');
      
      // Auto-submit when 6 digits are entered
      if (this.value.length === 6) {
        // Uncomment the next line to auto-submit
        // this.form.submit();
      }
    });
  </script>

</body>

</html>
<?php /**PATH D:\xampp\htdocs\project\sanq\mike\Axis-Laravel\resources\views/auth/2fa-login.blade.php ENDPATH**/ ?>