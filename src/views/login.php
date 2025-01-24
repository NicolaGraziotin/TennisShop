<section class="p-5 d-flex justify-content-center align-items-center">
    <div class="col-12 col-md-6 col-lg-4">
        <h1 class="mb-5 text-center">Login</h1>
        <form action="/login" method="post">
            <div class="mb-3">
                <label for="email" class="form-label">Indirizzo Email</label>
                <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="mb-3">
                <input class="form-check-input" type="checkbox" name="remind" value="true" id="remindCheck" />
                <label class="form-check-label" for="remindCheck">Ricordami</label>
            </div>
            <button type="submit" class="btn btn-primary mb-3 w-100">Login</button>
        </form>
        <p>Non sei registrato? <a href="/register">Registrati</a></p>
    </div>
</section>