<?php
    // Custom PHP code for file

?>
<div class="container register">
    <form action="/register" method="post">
        <h1>Registration</h1>
        <div class="input-container">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div class="input-container">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" required>
        </div>
        <div class="input-container">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>
        </div>
        <div class="input-container">
            <label for="confirm">Confirm</label>
            <input type="password" id="confirm" name="confirm" required>
        </div>

        <label for="toggle" class="label">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; I agree to the terms and services</label>
        <input type="checkbox" id="toggle" class="input-checkbox" required>
        <div class="checkbox"></div>

        <button type="submit" id="submittable">Register</button>
    </form>
    <div>
        <div class="typewriter">
            <h1>Lightscribe.</h1>
        </div>
    </div>
</div>
<script>
    document.getElementById('submittable').addEventListener('click', (event) => {
        let p1 = document.getElementById('password').value;
        let p2 = document.getElementById('confirm').value;
        let checks = document.getElementById('toggle').checked;

        if(p1 != p2) {
            event.preventDefault();
            alert("Passwords do not match!");
        }
        if(!checks) {
            event.preventDefault();
            alert("Please agree to the terms and services.");
        }
    });
</script>