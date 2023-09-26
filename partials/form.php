<form class="registration-form" method="post" enctype="multipart/form-data">
    <h5>რეგისტრაცია</h5>
    <div class="form-floating mb-3">
        <input type="text" class="form-control" placeholder="სახელი" name="name">
        <label for="floatingInput">სახელი</label>
    </div>
    <div class="form-floating">
        <input type="text" class="form-control"  name="surname" placeholder="გვარი">
        <label for="floatingPassword">გვარი</label>
    </div>
    <div class="form-floating">
        <input type="number" class="form-control" minlength="11" min="0" name="id_number" placeholder="პირადი ნომერი">
        <label for="floatingPassword">პირადი ნომერი</label>
    </div>
    <div class="form-floating">
        <input type="email" class="form-control"  name="email" placeholder="ელ ფოსტა">
        <label for="floatingPassword">ელ ფოსტა</label>
    </div>
    <div class="form-floating">
        <input type="password" class="form-control" minlength="6"  name="password" placeholder="პაროლი">
        <label for="floatingPassword">პაროლი</label>
    </div>
    <div class="form-floating">
        <input type="password" class="form-control"  name="password2" minlength="6" placeholder="გაიმეორეთ პაროლი">
        <label for="floatingPassword">გაიმეორეთ პაროლი</label>
    </div>
    <li class="list-group-item">
        <input class="form-check-input me-1" type="checkbox" onclick=exefunction() id="checkbox" name="checkbox" value="accept" id="firstCheckbox" onclick=validate() >
        <label class="form-check-label" for="firstCheckbox">ვეთანხმები წესებს</label>
  </li>
  <button name="search" type="submit" id="registerBtn" class="registerBtn btn btn-primary" disabled>რეგისტრაცია</button>
</form>