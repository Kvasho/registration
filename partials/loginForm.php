<form class="registration-form">
    <h5>კაბინეტში შესვლა</h5>
    <div class="form-floating mb-3">
        <input type="text" class="form-control" placeholder="ელ-ფოსტა" id="loginEmail" name="login_email">
        <label for="floatingInput">ელ-ფოსტა</label>
    </div>
    <div class="form-floating">
        <input type="password" class="form-control" name="login_password" id="loginPassword" placeholder="პაროლი">
        <label for="floatingPassword">პაროლი</label>
    </div>
    <p class="registration-form-error" style="display: none; font-size: 12px; color: red">იმეილი ან პაროლი არასწორია !!!</p>
    <button type="button" class="btn btn-primary" onclick="testClick()">Sign in</button>
</form>