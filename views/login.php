<section class="p-5 d-flex justify-content-center align-items-center">
    <div class="text-center w-25">
        <h1>Login</h1>
        <form action="/login" method="post">
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="seller" value="0">
                <label class="form-check-label" for="seller">Check me out</label>
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
    </div>
</section>
