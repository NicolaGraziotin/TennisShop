<section class="p-5">
    <h1>Register</h1>
    <form action="/register" method="post">
    <div class="mb-3">
        <label for="email" class="form-label">Email address</label>
        <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" id="password" name="password">
    </div>
    <div class="mb-3">
        <label for="name" class="form-label">name</label>
        <input type="name" class="form-control" id="name" name="name">
    </div>
    <div class="mb-3">
        <label for="surname" class="form-label">surname</label>
        <input type="surname" class="form-control" id="surname" name="surname">
    </div>
    <div class="mb-3 form-check">
        <input type="checkbox" class="form-check-input" id="seller" value="0">
        <label class="form-check-label" for="seller">Check me out</label>
    </div>
    <button type="submit" class="btn btn-primary">Register</button>
    </form>
</section>