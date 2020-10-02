<div class="col-sm-3">
    <div class="left-sidebar">
        <h2>Categories</h2>
        <div class="panel-group category-products" id="accordian">
            <?php getCategoriesAttributes($categories); ?>
        </div>

        <div class="brands_products">
            <!--brands_products-->
            <h2>Products In Categories</h2>
            <div class="brands-name">
                <ul class="nav nav-pills nav-stacked">
                    <?php getCategoriesListWithProductsCounter($categories); ?>
                </ul>
            </div>
        </div>
        <!--/brands_products-->
    </div>
</div>