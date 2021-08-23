<!--  START: Side Bar  -->

<div class="sl-logo"><a href="{{ route('admin.home') }}"><i class="icon ion-android-star-outline"></i>Administration</a></div>
<div class="sl-sideleft">
  <div class="sl-sideleft-menu">
    <a href="{{ route('admin.home') }}" class="sl-menu-link active">
      <div class="sl-menu-item">
        <i class="menu-item-icon icon ion-ios-home-outline tx-22"></i>
        <span class="menu-item-label">administration</span>
      </div><!-- menu-item -->
    </a><!-- sl-menu-link -->

    @if (Auth::user()->category == 1)
      <a href="#" class="sl-menu-link">
        <div class="sl-menu-item">
          <i class="menu-item-icon ion-ios-pie-outline tx-20"></i>
          <span class="menu-item-label">Categorie</span>
          <i class="menu-item-arrow fa fa-angle-down"></i>
        </div><!-- menu-item -->
      </a><!-- sl-menu-link -->
      <ul class="sl-menu-sub nav flex-column">
        <li class="nav-item"><a href="{{ route('admin.category.index') }}" class="nav-link">Categorie</a></li>
        <li class="nav-item"><a href="{{ route('admin.subcategory.index') }}" class="nav-link">sous Categorie</a></li>
        <li class="nav-item"><a href="{{ route('admin.brand.index') }}" class="nav-link">marque</a></li>
      </ul>
    @else
    @endif

    @if (Auth::user()->coupon == 1)
      <a href="#" class="sl-menu-link">
        <div class="sl-menu-item">
          <i class="menu-item-icon icon fa fa-gift tx-24"></i>
          <span class="menu-item-label">Coupon</span>
          <i class="menu-item-arrow fa fa-angle-down"></i>
        </div><!-- menu-item -->
      </a><!-- sl-menu-link -->
      <ul class="sl-menu-sub nav flex-column">
        <li class="nav-item"><a href="{{ route('admin.coupon.index') }}" class="nav-link">Coupon</a></li>
      </ul>
    @else
    @endif

    @if (Auth::user()->product == 1)
      <a href="#" class="sl-menu-link">
        <div class="sl-menu-item">
          <i class="menu-item-icon icon ion-ios-filing-outline tx-24"></i>
          <span class="menu-item-label">Produit</span>
          <i class="menu-item-arrow fa fa-angle-down"></i>
        </div><!-- menu-item -->
      </a><!-- sl-menu-link -->
      <ul class="sl-menu-sub nav flex-column">
        <li class="nav-item"><a href="{{ route('admin.product.index') }}" class="nav-link">tous Produits </a></li>
        <li class="nav-item"><a href="{{ route('admin.product.create') }}" class="nav-link">ajouter Produit</a></li>
      </ul>
    @else
    @endif

    @if (Auth::user()->blog == 1)
      <a href="#" class="sl-menu-link">
        <div class="sl-menu-item">
          <i class="menu-item-icon fa fa-book tx-20"></i>
          <span class="menu-item-label">Blog</span>
          <i class="menu-item-arrow fa fa-angle-down"></i>
        </div><!-- menu-item -->
      </a><!-- sl-menu-link -->
      <ul class="sl-menu-sub nav flex-column">
        <li class="nav-item"><a href="{{ route('admin.postCategory.index') }}" class="nav-link">Post Category</a></li>
        <li class="nav-item"><a href="{{ route('admin.blogPost.create') }}" class="nav-link">Add Blog Post</a></li>
        <li class="nav-item"><a href="{{ route('admin.blogPost.index') }}" class="nav-link">All Blog Post</a></li>
      </ul>
    @else
    @endif

    @if (Auth::user()->order == 1)
      <a href="#" class="sl-menu-link">
        <div class="sl-menu-item">
          <i class="menu-item-icon icon ion-ios-bookmarks-outline tx-20"></i>
          <span class="menu-item-label">Orders</span>
          <i class="menu-item-arrow fa fa-angle-down"></i>
        </div><!-- menu-item -->
      </a><!-- sl-menu-link -->
      <ul class="sl-menu-sub nav flex-column">
        <li class="nav-item"><a href="{{ route('admin.orders.index') }}" class="nav-link">Commandes</a></li>
        <li class="nav-item"><a href="{{ route('admin.orders.confirm.index') }}" class="nav-link">Confirm Order</a></li>
        <li class="nav-item"><a href="{{ route('admin.orders.progress.index') }}" class="nav-link">Delivery Progress</a></li>
        <li class="nav-item"><a href="{{ route('admin.orders.delivery.index') }}" class="nav-link">Delivery Success</a></li>
        <li class="nav-item"><a href="{{ route('admin.orders.cancle.index') }}" class="nav-link">Cancle Order</a></li>
      </ul>
    @else
    @endif

    @if (Auth::user()->order == 1)
      <a href="#" class="sl-menu-link">
        <div class="sl-menu-item">
          <i class="menu-item-icon icon ion-ios-bookmarks-outline tx-20"></i>
          <span class="menu-item-label">Return Order</span>
          <i class="menu-item-arrow fa fa-angle-down"></i>
        </div><!-- menu-item -->
      </a><!-- sl-menu-link -->
      <ul class="sl-menu-sub nav flex-column">
        <li class="nav-item"><a href="{{ route('admin.orders.return.index') }}" class="nav-link">Return Request</a></li>
        <li class="nav-item"><a href="{{ route('admin.orders.all.return.index') }}" class="nav-link">All Return Order</a></li>
      </ul>
    @else
    @endif

    @if (Auth::user()->report == 1)
      <a href="#" class="sl-menu-link">
        <div class="sl-menu-item">
          <i class="menu-item-icon fa fa-file tx-18"></i>
          <span class="menu-item-label">Reports</span>
          <i class="menu-item-arrow fa fa-angle-down"></i>
        </div><!-- menu-item -->
      </a><!-- sl-menu-link -->
      <ul class="sl-menu-sub nav flex-column">
        <li class="nav-item"><a href="{{ route('admin.report.today.order') }}" class="nav-link">Today Order</a></li>
        <li class="nav-item"><a href="{{ route('admin.report.today.delivery') }}" class="nav-link">Today Deliverey</a></li>
        <li class="nav-item"><a href="{{ route('admin.report.this.month') }}" class="nav-link">This Month</a></li>
        <li class="nav-item"><a href="{{ route('admin.report.this.year') }}" class="nav-link">This Year</a></li>
        <li class="nav-item"><a href="{{ route('admin.report.search.index') }}" class="nav-link">Search Reports</a></li>
      </ul>
    @else
    @endif

    @if (Auth::user()->product_stock == 1)
      <a href="#" class="sl-menu-link">
        <div class="sl-menu-item">
          <i class="menu-item-icon fa fa-archive tx-18"></i>
          <span class="menu-item-label">Stock</span>
          <i class="menu-item-arrow fa fa-angle-down"></i>
        </div><!-- menu-item -->
      </a><!-- sl-menu-link -->
      <ul class="sl-menu-sub nav flex-column">
        <li class="nav-item"><a href="{{ route('admin.product.stock') }}" class="nav-link">Stock Product</a></li>
      </ul>
    @else
    @endif

    @if (Auth::user()->user_role == 1)
      <a href="#" class="sl-menu-link">
        <div class="sl-menu-item">
          <i class="menu-item-icon fa fa-users tx-18"></i>
          <span class="menu-item-label">User Role</span>
          <i class="menu-item-arrow fa fa-angle-down"></i>
        </div><!-- menu-item -->
      </a><!-- sl-menu-link -->
      <ul class="sl-menu-sub nav flex-column">
        <li class="nav-item"><a href="{{ route('admin.create.new.user') }}" class="nav-link">Add User</a></li>
        <li class="nav-item"><a href="{{ route('admin.user.all.list') }}" class="nav-link">All User</a></li>
      </ul>
    @else
    @endif

    @if (Auth::user()->contact_message == 1)
      <a href="#" class="sl-menu-link">
        <div class="sl-menu-item">
          <i class="menu-item-icon fa fa-inbox tx-18"></i>
          <span class="menu-item-label">Inbox</span>
          <i class="menu-item-arrow fa fa-angle-down"></i>
        </div><!-- menu-item -->
      </a><!-- sl-menu-link -->
      <ul class="sl-menu-sub nav flex-column">
        <li class="nav-item"><a href="{{ route('admin.contact.message.list') }}" class="nav-link">Contact Message</a></li>
      </ul>
    @else
    @endif

    @if (Auth::user()->contact_message == 1)
      <a href="#" class="sl-menu-link">
        <div class="sl-menu-item">
          <i class="menu-item-icon fa fa-comments tx-18"></i>
          <span class="menu-item-label">Comments</span>
          <i class="menu-item-arrow fa fa-angle-down"></i>
        </div><!-- menu-item -->
      </a><!-- sl-menu-link -->
      <ul class="sl-menu-sub nav flex-column">
        <li class="nav-item"><a href="{{ route('admin.product.comment.list') }}" class="nav-link">Product Comment</a></li>
      </ul>
    @else
    @endif

    <a href="#" class="sl-menu-link">
      <div class="sl-menu-item">
        <i class="menu-item-icon fa fa-cogs tx-18"></i>
        <span class="menu-item-label">Settings</span>
        <i class="menu-item-arrow fa fa-angle-down"></i>
      </div><!-- menu-item -->
    </a><!-- sl-menu-link -->
    <ul class="sl-menu-sub nav flex-column">
      <li class="nav-item"><a href="{{ route('admin.site.setting.index') }}" class="nav-link">Site Settings</a></li>
      <li class="nav-item"><a href="{{ route('admin.seo.index') }}" class="nav-link">Seo Settings</a></li>
      <li class="nav-item"><a href="{{ route('admin.databasebackup.index') }}" class="nav-link">Database Backup</a></li>
    </ul>

    @if (Auth::user()->other == 1)
      <a href="#" class="sl-menu-link">
        <div class="sl-menu-item">
          <i class="menu-item-icon icon ion-ios-paper-outline tx-22"></i>
          <span class="menu-item-label">Others</span>
          <i class="menu-item-arrow fa fa-angle-down"></i>
        </div><!-- menu-item -->
      </a><!-- sl-menu-link -->
      <ul class="sl-menu-sub nav flex-column">
        <li class="nav-item"><a href="{{ route('admin.newslatter.index') }}" class="nav-link">Newslatter</a></li>
      </ul>
    @else
    @endif

  </div><!-- sl-sideleft-menu -->

  <br>
</div><!-- sl-sideleft -->

<!----- END: Side Bar ----->
