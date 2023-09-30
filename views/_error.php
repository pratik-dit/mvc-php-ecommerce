<div class="row justify-content-center">
    <div class="col-md-12 col-sm-12">
        <div class="card shadow-lg border-0 rounded-lg mt-5 mx-auto" style="width: 30rem;">
            <h3 class="card-header display-1 text-muted text-center">
              <?php echo $exception->getCode() ?>
            </h3>

            <span class="card-subtitle mb-2 text-muted text-center">
              <?php echo $exception->getMessage() ?> 
            </span>

            <div class="card-body mx-auto">
                <a type="button" href="/"
                class="btn btn-sm btn-info text-white"> Back To Home </a>
            </div>
        </div>
    </div>
</div>
