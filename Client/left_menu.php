<div class="col-sm-3">
    <div class="left-sidebar">
        <h2>Categories</h2>
        <div class="panel-group category-products" id="accordian">
            <!--category-productsr-->

            <?php getCategoriesAttributes($categories); ?>

<!--            <div class="panel panel-default">-->
<!--                <div class="panel-heading">-->
<!--                    <h4 class="panel-title">-->
<!--                        <a data-toggle="collapse" data-parent="#accordian" href="#sportswear">-->
<!--                            <span class="badge pull-right"><i class="fa fa-plus"></i></span>-->
<!--                            Colors-->
<!--                        </a>-->
<!--                    </h4>-->
<!--                </div>-->
<!--                <div id="sportswear" class="panel-collapse collapse">-->
<!--                    <div class="panel-body">-->
<!--                        <ul>-->
<!--                            --><?php //getAtributeLabelsList($categories); ?>
<!--                        </ul>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->

<!--            <div class="panel panel-default">-->
<!--                <div class="panel-heading">-->
<!--                    <h4 class="panel-title">-->
<!--                        <a data-toggle="collapse" data-parent="#accordian" href="#mens">-->
<!--                            <span class="badge pull-right"><i class="fa fa-plus"></i></span>-->
<!--                            Sizes-->
<!--                        </a>-->
<!--                    </h4>-->
<!--                </div>-->
<!--                <div id="mens" class="panel-collapse collapse">-->
<!--                    <div class="panel-body">-->
<!--                        <ul>-->
<!--                            --><?php //getCategoriesList($categories); ?>
<!--                        </ul>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->

            <?php getCategoriesListInSeparatePanels($categories); ?>
        </div>
        <!--/category-products-->
        <h2>Categories</h2>

        <div class="brands_products">
            <!--brands_products-->
            <h2>Labels</h2>
            <div class="brands-name">
                <ul class="nav nav-pills nav-stacked">
<!--                    --><?php //getLabelsWithCounterProducts($categories); ?>
                </ul>
            </div>
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