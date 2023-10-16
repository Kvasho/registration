<form class="registration-form" method="post" id="form" enctype="multipart/form-data">
    <h5>რეგისტრაცია</h5>
    <div class="form-floating mb-3">
        <input type="text" class="form-control" placeholder="სახელი" name="name" id="name" autocomplete="on">
        <label for="name">სახელი</label>
        <span id="name_span" style="color: brown; font-size: 12px;"></span>
    </div>
    <div class="form-floating">
        <input type="text" class="form-control" name="surname" id="surname" placeholder="გვარი">
        <label for="surname">გვარი</label>
        <span id="surname_span" style="color: brown; font-size: 12px;"></span>
    </div>
    <div class="form-floating">
        <input type="number" class="form-control" id="id_number" name="id_number" placeholder="პირადი ნომერი">
        <label for="id_number">პირადი ნომერი</label>
        <span id="id_number_span" style="color: brown; font-size: 12px;"></span>
    </div>
    <div class="form-floating">
        <input type="email" class="form-control" name="email" id="email" placeholder="ელ ფოსტა" autocomplete="on">
        <label for="email">ელ ფოსტა</label>
    </div>
    <div class="form-floating">
        <input type="password" class="form-control" id="password" name="password" placeholder="პაროლი">
        <label for="password">პაროლი</label>
        <span id="password_span" style="color: brown; font-size: 12px;"></span>
    </div>
    <div class="form-floating">
        <input type="password" class="form-control" name="password2" id="password2" placeholder="გაიმეორეთ პაროლი">
        <label for="password2">გაიმეორეთ პაროლი</label>
        <span id="password_span2" style="color: brown; font-size: 12px;"></span>
    </div>
    <div class="form-floating">
        <input type="file" class="form-control" name="image" id="image">
        <label for="image">ატვირთეთ ფოტოსურათი</label>
    </div>
    <li class="list-group-item">
        <input class="form-check-input me-1" type="checkbox" onclick=exefunction() id="checkbox" name="checkbox" onclick=validate() required>
        <label class="form-check-label" for="checkbox" style="color: white;">ვეთანხმები წესებს</label>
    </li>
    <button name="search" type="submit" id="registerBtn" class="registerBtn btn btn-primary" disabled>რეგისტრაცია</button>
</form>

<script>
    document.getElementById("form").addEventListener("submit", function(event) {
        const input = document.getElementById("id_number");
        if (input.value.length < 10) {
            document.getElementById("id_number").style.border = "1px solid brown";
            document.getElementById("id_number_span").innerHTML = "პირადი ნომერი უნდა შეიცავდეს მინიმუმ 11 ციფრს";
            event.preventDefault(); // Prevent form submission
        }
    });

    document.getElementById("form").addEventListener("submit", function(event) {
        const input = document.getElementById("password");
        if (input.value.length < 6) {
            document.getElementById("password").style.border = "1px solid brown";
            document.getElementById("password_span").innerHTML = "პაროლი უნდა შეიცავდეს მინიმუმ 6 სიმბოლოს";
            event.preventDefault(); // Prevent form submission
        }
    });
    document.getElementById("form").addEventListener("submit", function(event) {
        const input = document.getElementById("password2");
        if (input.value.length < 6) {
            document.getElementById("password2").style.border = "1px solid brown";
            document.getElementById("password_span2").innerHTML = "პაროლი უნდა შეიცავდეს მინიმუმ 6 სიმბოლოს";
            event.preventDefault(); // Prevent form submission
        }
    });
    document.addEventListener('DOMContentLoaded', function() {
        var form = document.getElementById('form');
        var input = document.getElementById('name');

        form.addEventListener('submit', function(event) {
            var inputValue = input.value.trim(); // Get the input value and trim whitespace

            // Check if the input contains only letters using a regular expression
            if (!/^[a-zA-Z]+$/.test(inputValue)) {
                // Display an error message and prevent form submission
                document.getElementById('name').style.border = "1px solid brown";
                document.getElementById("name_span").innerHTML = "სახელი არ უნდა შეიცავდეს ციფრს";
                event.preventDefault(); // Prevent form submission
            }
        });
    });

    document.addEventListener('DOMContentLoaded', function() {
        var form = document.getElementById('form');
        var input = document.getElementById('surname');

        form.addEventListener('submit', function(event) {
            var inputValue = input.value.trim(); // Get the input value and trim whitespace

            // Check if the input contains only letters using a regular expression
            if (!/^[a-zA-Z]+$/.test(inputValue)) {
                // Display an error message and prevent form submission
                document.getElementById('surname').style.border = "1px solid brown";
                document.getElementById("surname_span").innerHTML = "გვარი არ უნდა შეიცავდეს ციფრს";
                event.preventDefault(); // Prevent form submission
            }
        });
    });
</script>