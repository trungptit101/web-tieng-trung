@if(Session::has('success'))
    <script type="text/javascript">
        var message = "{{Session::get('success') }}"
        toastr.success(message);
    </script>
@endif

@if(Session::has('error'))
    <script type="text/javascript">
        var message = "{{Session::get('error') }}"
        toastr.error(message);
    </script>
@endif

@if(Session::has('warning'))
    <script type="text/javascript">
        var message = "{{Session::get('warning') }}"
        toastr.warning(message);
    </script>
@endif

@if(Session::has('not_permission'))
    <script type="text/javascript">
        var message = "{{Session::get('not_permission') }}"
        toastr.error(message);
    </script>
@endif

<script !src="">
    $('.delete').click(function () {
        $('.form-delete').attr('action', $(this).attr('data-link'));
        $('#deleteModal').modal('show');
    });
    $('.active-account').click(function () {
        $('.active-account-shop').attr('action', $(this).attr('data-link'));
        $('#active-account-shop').modal('show');
    });
    $('.inactive-account').click(function () {
        $('.inactive-account-shop').attr('action', $(this).attr('data-link'));
        $('#inactive-account-shop').modal('show');
    });
    $('.active-product').click(function () {
        $('.active-product-shop').attr('action', $(this).attr('data-link'));
        $('#active-product-shop').modal('show');
    });
    $('.inactive-product').click(function () {
        $('.inactive-product-shop').attr('action', $(this).attr('data-link'));
        $('#inactive-product-shop').modal('show');
    });
    $('.update').click(function () {
        $('.form-update').attr('action', $(this).attr('data-link'));
        $('#updateModal').modal('show');
        if ($(this).attr('modal-title').length > 0) {
            $('#updateModal .modal-title').text($(this).attr('modal-title'));
        }
    });
    $('.update-shipping-status').click(function () {
        $('.form-update').attr('action', $(this).attr('data-link'));
        $('#updateShippingStatus').modal('show');
        $('input[name="old_shipping_status"]').val($(this).attr('shipping-status'))
        $(".sel-shipping_status").val($(this).attr('shipping-status')).change();
    });
    $('.update-shipping-status-btn').click(function () {
        var oldShippingStatus = $('input[name="old_shipping_status"]').val();
    });
</script>

<div class="modal fade" id="active-product-shop">
    <div class="modal-dialog">
        <form action="" method="get" class="active-product-shop">
            @csrf
            <div class="modal-content">
                <div class="modal-body" style="text-align: center;">
                    <i class="fas fa-question-circle" style="font-size: 50px;color: green;"></i>
                    <h3 style="padding-top: 15px; font-size: 17px;"> Bạn có muốn duyệt sản phẩm không?</h3>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Hủy</button>
                    <button type="submit" class="btn btn-danger btn-sm">Chấp nhận</button>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="modal fade" id="inactive-product-shop">
    <div class="modal-dialog">
        <form action="" method="get" class="inactive-product-shop">
            @csrf
            <div class="modal-content">
                <div class="modal-body" style="text-align: center;">
                    <i class="fas fa-question-circle" style="font-size: 50px;color: green;"></i>
                    <h3 style="padding-top: 15px; font-size: 17px;"> Bạn có muốn ngừng duyệt sản phẩm không?</h3>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Hủy</button>
                    <button type="submit" class="btn btn-danger btn-sm">Chấp nhận</button>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="modal fade" id="active-account-shop">
    <div class="modal-dialog">
        <form action="" method="get" class="active-account-shop">
            @csrf
            <div class="modal-content">
                <div class="modal-body" style="text-align: center;">
                    <i class="fas fa-question-circle" style="font-size: 50px;color: green;"></i>
                    <h3 style="padding-top: 15px; font-size: 17px;"> Bạn có muốn xác thực shop hoạt động không?</h3>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Hủy</button>
                    <button type="submit" class="btn btn-danger btn-sm">Chấp nhận</button>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="modal fade" id="inactive-account-shop">
    <div class="modal-dialog">
        <form action="" method="post" class="inactive-account-shop">
            @csrf
            <div class="modal-content">
                <div class="modal-body" style="text-align: center;">
                    <i class="fas fa-question-circle" style="font-size: 50px;color: red;"></i>
                    <h3 style="padding-top: 15px; font-size: 17px;"> Bạn có muốn ngưng hoạt động shop không?</h3>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Hủy</button>
                    <button type="submit" class="btn btn-danger btn-sm">Chấp nhận</button>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="modal fade" id="deleteModal">
    <div class="modal-dialog">
        <form action="" method="post" class="form-delete">
            @csrf
            <div class="modal-content">
                <div class="modal-body" style="text-align: center;">
                    <i class="fas fa-question-circle" style="font-size: 50px;color: red;"></i>
                    <h3 style="padding-top: 15px; font-size: 17px;"> Bạn có muốn xóa không?</h3>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Hủy</button>
                    <button type="submit" class="btn btn-danger btn-sm">Chấp nhận</button>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="modal fade" id="updateModal">
    <div class="modal-dialog">
        <form action="" method="post" class="form-update">
            @csrf
            <div class="modal-content">
                <div class="modal-body" style="text-align: center;">
                    <i class="fas fa-question-circle" style="font-size: 50px;color: green;"></i>
                    <h3 class="modal-title" style="padding-top: 15px; font-size: 17px;"> Bạn có muốn cập nhật không?</h3>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Hủy</button>
                    <button type="submit" class="btn btn-primary btn-sm">Chấp nhận</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script !src="">
    $('.update-shipping-status-btn').click(function () {
        var oldShippingStatus = $('input[name="old_shipping_status"]').val();
        var newShippingStatus = $('.sel-shipping_status option:selected').val();
        if (newShippingStatus === oldShippingStatus) {
            alert('Không có gì thay đổi.');
        } else {
            $( ".form-update-shipping-status" ).submit();
        }
    });
</script>
