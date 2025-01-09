<div class="dropdown">
    <a class="btn btn-outline-dark me-1" id="navbarDropdown" href="#" role="button"
        data-bs-toggle="dropdown" aria-expanded="false">
        <i class="bi bi-person-check-fill"></i>
        <?php echo $profileName ?>
    </a>
    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
        <li><a class="dropdown-item" href="/informations">Personal informations</a></li>
        <li><a class="dropdown-item" href="/orders">Orders</a></li>
        <li>
            <hr class="dropdown-divider" />
        </li>
        <li><a class="dropdown-item" href="/logout">Logout</a></li>
    </ul>
</div>