<section class="p-5 d-flex justify-content-center align-items-center">
    <div class="col-12 col-md-6 col-lg-4">
        <h1 class="mb-5 text-center">Login</h1>
        <form action="/login" method="post">
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <div class="mb-3">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" />
                <label class="form-check-label" for="flexCheckDefault">Remind me</label>
            </div>
            <button type="submit" class="btn btn-primary mb-3 w-100">Login</button>
        </form>
        <p>Not a member? <a href="/register">Register</a></p>
    </div>
</section>