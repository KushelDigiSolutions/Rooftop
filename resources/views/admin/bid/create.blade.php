@extends('admin.layouts.app')



@section('title', 'Create Bid')



<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"

  integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"></script>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<style>
#gst_error {
    font-size: 12px;
}
  .selectMultiple {

    width: 100%;

    font-family: var(--main-font) !important;

    position: relative;

    z-index: 2;

  }



  .selectMultiple select {

    display: none;

  }



  .selectMultiple>div {

    position: relative;

    z-index: 2;

    padding: 8px 12px 2px 12px;

    border-radius: 4px;

    background: #fff;

    font-size: 14px;

    min-height: 40px;

    border: 1px solid var(--p50);

    transition: box-shadow 0.3s ease;

  }



  /* .selectMultiple > div:hover {

    box-shadow: 0 4px 24px -1px rgba(22, 42, 90, 0.16);

  } */

  .selectMultiple>div .arrow {

    right: 1px;

    top: 0;

    bottom: 0;

    cursor: pointer;

    width: 28px;

    position: absolute;

  }



  .selectMultiple>div .arrow:before,

  .selectMultiple>div .arrow:after {

    content: "";

    position: absolute;

    display: block;

    width: 2px;

    height: 8px;

    border-bottom: 8px solid #99A3BA;

    top: 43%;

    transition: all 0.3s ease;

  }



  .selectMultiple>div .arrow:before {

    right: 12px;

    transform: rotate(-130deg);

  }



  .selectMultiple>div .arrow:after {

    left: 9px;

    transform: rotate(130deg);

  }



  .selectMultiple>div span {

    color: #99A3BA;

    display: block;

    position: absolute;

    left: 12px;

    cursor: pointer;

    top: 8px;

    line-height: 28px;

    transition: all 0.3s ease;

  }



  .selectMultiple>div span.hide {

    opacity: 0;

    visibility: hidden;

    transform: translate(-4px, 0);

  }



  .selectMultiple>div a {

    position: relative;

    padding: 0 24px 6px 8px;

    line-height: 28px;

    color: #3F3F3F;

    display: inline-block;

    vertical-align: top;

    margin: 0 6px 0 0;

  }



  .selectMultiple>div a em {

    font-style: normal;

    display: block;

    white-space: nowrap;

  }



  .selectMultiple>div a:before {

    content: "";

    left: 0;

    top: 0;

    bottom: 6px;

    width: 100%;

    position: absolute;

    display: block;

    background: #E8E8E8;

    z-index: -1;

    border-radius: 4px !important;

  }



  .selectMultiple>div a i {

    cursor: pointer;

    position: absolute;

    top: 0;

    right: 0;

    width: 24px;

    height: 28px;

    display: block;

  }



  .selectMultiple>div a i:before,

  .selectMultiple>div a i:after {

    content: "";

    display: block;

    width: 2px;

    height: 10px;

    position: absolute;

    left: 50%;

    top: 50%;

    background: #3F3F3F;

    border-radius: 1px;

  }



  .selectMultiple>div a i:before {

    transform: translate(-50%, -50%) rotate(45deg);

  }



  .selectMultiple>div a i:after {

    transform: translate(-50%, -50%) rotate(-45deg);

  }



  .selectMultiple>div a.notShown {

    opacity: 0;

    transition: opacity 0.3s ease;

  }



  .selectMultiple>div a.notShown:before {

    width: 28px;

    transition: width 0.45s cubic-bezier(0.87, -0.41, 0.19, 1.44) 0.2s;

  }



  .selectMultiple>div a.notShown i {

    opacity: 0;

    transition: all 0.3s ease 0.3s;

  }



  .selectMultiple>div a.notShown em {

    opacity: 0;

    transform: translate(-6px, 0);

    transition: all 0.4s ease 0.3s;

  }



  .selectMultiple>div a.notShown.shown {

    opacity: 1;

  }



  .selectMultiple>div a.notShown.shown:before {

    width: 100%;

  }



  .selectMultiple>div a.notShown.shown i {

    opacity: 1;

    color: #3F3F3F !important;

  }



  .selectMultiple>div a.notShown.shown em {

    opacity: 1;

    color: #3F3F3F;

    transform: translate(0, 0);

  }



  .selectMultiple>div a.remove:before {

    width: 28px;

    transition: width 0.4s cubic-bezier(0.87, -0.41, 0.19, 1.44) 0s;

  }



  .selectMultiple>div a.remove i {

    opacity: 0;

    transition: all 0.3s ease 0s;

  }



  .selectMultiple>div a.remove em {

    opacity: 0;

    transform: translate(-12px, 0);

    transition: all 0.4s ease 0s;

  }



  .selectMultiple>div a.remove.disappear {

    opacity: 0;

    transition: opacity 0.5s ease 0s;

  }



  .selectMultiple>ul {

    margin: 0;

    padding: 0;

    list-style: none;

    font-size: 16px;

    z-index: 1;

    position: absolute;

    top: 100%;

    left: 0;

    right: 0;

    visibility: hidden;

    opacity: 0;

    border-radius: 8px;

    transform: translate(0, 20px) scale(0.8);

    transform-origin: 0 0;

    filter: drop-shadow(0 12px 20px rgba(22, 42, 90, 0.08));

    transition: all 0.4s ease, transform 0.4s cubic-bezier(0.87, -0.41, 0.19, 1.44), filter 0.3s ease 0.2s;

  }



  .selectMultiple>ul li {

    color: #1E2330;

    background: #fff;

    padding: 12px 16px;

    cursor: pointer;

    overflow: hidden;

    position: relative;

    transition: background 0.3s ease, color 0.3s ease, transform 0.3s ease 0.3s, opacity 0.5s ease 0.3s, border-radius 0.3s ease 0.3s;

  }



  .selectMultiple>ul li:first-child {

    border-radius: 8px 8px 0 0;

  }



  .selectMultiple>ul li:first-child:last-child {

    border-radius: 8px;

  }



  .selectMultiple>ul li:last-child {

    border-radius: 0 0 8px 8px;

  }



  .selectMultiple>ul li:last-child:first-child {

    border-radius: 8px;

  }



  .selectMultiple>ul li:hover {

    background: #797979;

    color: #fff;

  }



  .selectMultiple>ul li:after {

    content: "";

    position: absolute;

    top: 50%;

    left: 50%;

    width: 6px;

    height: 6px;

    background: rgba(0, 0, 0, 0.4);

    opacity: 0;

    border-radius: 100%;

    transform: scale(1, 1) translate(-50%, -50%);

    transform-origin: 50% 50%;

  }



  .selectMultiple>ul li.beforeRemove {

    border-radius: 0 0 8px 8px;

  }



  .selectMultiple>ul li.beforeRemove:first-child {

    border-radius: 8px;

  }



  .selectMultiple>ul li.afterRemove {

    border-radius: 8px 8px 0 0;

  }



  .selectMultiple>ul li.afterRemove:last-child {

    border-radius: 8px;

  }



  .selectMultiple>ul li.remove {

    transform: scale(0);

    opacity: 0;

  }



  .selectMultiple>ul li.remove:after {

    -webkit-animation: ripple 0.4s ease-out;

    animation: ripple 0.4s ease-out;

  }



  .selectMultiple>ul li.notShown {

    display: none;

    transform: scale(0);

    opacity: 0;

    transition: transform 0.35s ease, opacity 0.4s ease;

  }



  .selectMultiple>ul li.notShown.show {

    transform: scale(1);

    opacity: 1;

  }



  /* .selectMultiple.open > div {

    box-shadow: 0 4px 20px -1px rgba(22, 42, 90, 0.12);

  } */

  .selectMultiple.open>div .arrow:before {

    transform: rotate(-50deg);

  }



  .selectMultiple.open>div .arrow:after {

    transform: rotate(50deg);

  }



  .selectMultiple.open>ul {

    transform: translate(0, 12px) scale(1);

    opacity: 1;

    visibility: visible;

    filter: drop-shadow(0 16px 24px rgba(22, 42, 90, 0.16));

  }



  .dropdown-search {

    padding: 8px;

    background-color: var(--white);

  }



  .search-input {

    width: 100%;

    background-color: var(--white);

    height: 40px;

    padding: 0 10px;

    font-size: 14px;

    border: 1px solid var(--p50);

    border-radius: 4px;

    outline: none;

  }



  @-webkit-keyframes ripple {

    0% {

      transform: scale(0, 0);

      opacity: 1;

    }



    25% {

      transform: scale(30, 30);

      opacity: 1;

    }



    100% {

      opacity: 0;

      transform: scale(50, 50);

    }

  }



  @keyframes ripple {

    0% {

      transform: scale(0, 0);

      opacity: 1;

    }



    25% {

      transform: scale(30, 30);

      opacity: 1;

    }



    100% {

      opacity: 0;

      transform: scale(50, 50);

    }

  }



  @import url(designSystem.css);



  .info-tabs {

    padding: 16px;

    display: flex;

    row-gap: 16px;

    column-gap: 16px;

  }



  .info-tabs a {

    width: 100%;

  }



  .info-card {

    height: auto;

    width: 100%;

    padding: 16px;

    border-radius: 6px;

    background-color: var(--white);

    border: 1px solid var(--dark-light);

    transition: all ease-in 0.3s;

  }



  .info-card:hover {

    box-shadow: var(--shadow);

  }





  .info-card img {

    max-width: 50px;

    margin-bottom: 12px;

  }

</style>

@section('content')

<div class="dataOverviewSection mt-3 mb-3">

  <form action="{{ route('quotation.store') }}" method="POST" enctype="multipart/form-data" class="mt-3" id="productForm">

    @csrf

    <div class="dataOverviewSection mt-3">

      <div class="dataOverview mt-3">

        <h6 class="m-0">Create New Bid</h6>

        <hr class="m-0 mt-2 mb-2">

        <p class="m-0 mt-3"><i>Client Details</i></p>

        <div class="row">

          <div class="col-md-3">

            <div class="mb-3 w-100">

              <label for="NameInput" class="form-label mb-1">Name</label>

              <input type="text" name="name" id="name" value="{{$appointment_data->name}}" class="form-control w-100" readonly>

              <input type="hidden" name="appoint_id" value="{{$appointment_data->id}}" class="form-control w-100" id="appoint_id" readonly>

              <input type="hidden" name="franchise_id" value="{{$appointment_data->franchise_id}}" class="form-control w-100" id="franchise_id" readonly>

            </div>

          </div>

          <div class="col-md-3">

            <div class="mb-3 w-100">

              <label for="UserEmailInput" class="form-label mb-1">Email ID</label>

              <input type="email" name="email" value="{{$appointment_data->email}}" class="form-control w-100" id="email" readonly>

            </div>

          </div>

          <div class="col-md-3">

            <div class="mb-3 w-100">

              <label for="contactNumberInput" class="form-label mb-1">Contact Number</label>

              <input type="number" name="number" class="form-control w-100" value="{{$appointment_data->mobile}}" id="contact" readonly>

            </div>

          </div>

          <div class="col-md-3">

            <div class="mb-3 w-100">

              <label for="stateInput" class="form-label mb-1">Bid Creation Date</label>

              <input type="text" name="date" id="biddate" class="form-control w-100"  placeholder="MM-DD-YYYY">

            </div>

          </div>

          <div class="col-md-4">

            <div class="mb-3 w-100">

              <label for="AddressInput" class="form-label mb-1">Address</label>

              <textarea name="address" id="AddressInput" class="form-control w-100" readonly>{{$appointment_data->address}}</textarea>

            </div>

          </div>

          <div class="col-md-4">

            <div class="mb-3 w-100">

              <label for="gst_uin" class="form-label mb-1">Project Name</label>
              <input type="text" name="project_name" id="" class="form-control w-100" maxlength="15">
              <div id="gst_error" class="text-danger mt-1" style="display:none;">Invalid GSTIN format.</div>

            </div>

          </div>


          <div class="col-md-3">

            <div class="mb-3 w-100">

              <label for="QuotationForInput" class="form-label mb-1">Project Description</label>
              <textarea name="project_description" id="project_description" class="form-control w-100" ></textarea>

            </div>

          </div>

          

          <div class="col-md-3">

            <div class="mb-3 w-100">

              <label for="buyer_ref_Input" class="form-label mb-1">Buyer's Ref/Order No</label>

              <input type="text" name="buyer_ref" class="form-control w-100" value="{{$appointment_data->uniqueid}}" id="buyer_ref_Input" readonly>

            </div>

          </div>

          <div class="col-md-3">

            <div class="mb-3 w-100">

              <label for="other_ref_Input" class="form-label mb-1">Scope of Work</label>

              <textarea name="scope_work" id="scope_work" class="form-control w-100" ></textarea>

            </div>

          </div>

          

          <div class="col-md-3">

            <div class="mb-3 w-100">

              <label for="cartageInput" class="form-label mb-1">Remarks</label>

              <input type="text" name="cartage" class="form-control w-100" id="cartageInput">

            </div>

          </div>



          <!-- <div class="col-md-3">

            <div class="mb-3 w-100">

              <label for="dispatch_Input" class="form-label mb-1">Dispatched through</label>

              <input type="text" name="dispatch" class="form-control w-100" id="dispatch_Input">

            </div>

          </div> -->

          <div class="col-md-3">

            {{-- <div class="mb-3 w-100">

              <label for="destination_Input" class="form-label mb-1">Destination</label>

              <input type="text" name="destination" class="form-control w-100" id="destination_Input">

            </div> --}}

          </div>



          <!-- <div class="col-md-3">

            <div class="mb-3 w-100">

              <label for="city_port_Input" class="form-label mb-1">City/Port of Loading</label>

              <input type="text" name="city_port" class="form-control w-100" id="city_port_Input">

            </div>

          </div> -->

          <!-- <div class="col-md-3">

            <div class="mb-3 w-100">

              <label for="terms_deliver_Input" class="form-label mb-1">Terms of Delivery</label>

              <input type="text" name="terms_deliver" class="form-control w-100" id="terms_deliver_Input">

            </div>

          </div> -->

        </div>

        <!-- new section -->

        <div class="sectionContainer" id="sectionContainer">

          

        </div>

        <!-- <button class="secondary-btn mt-1 addBtn add-section-btn">Add New Section</button> -->

        <p class="secondary-btn mt-1 addBtn add-section-btn">Add New Section</p>

      </div>



      <div class="mt-3 d-flex gap-3 mb-4">

        <button class="primary-btn">Create Bid</button>

        <button class="secondary-btn">Cancel</button>

      </div>

    </div>

  </form>

</div>





<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.js"

  integrity="sha512-+k1pnlgt4F1H8L7t3z95o3/KO+o78INEcXTbnoJQ/F2VqDVhWoaiVml/OEHv9HsVgxUaVW+IbiZPUJQfF/YxZw=="

  crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<!-- bootstrap JS -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"

  integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"

  crossorigin="anonymous"></script>





<script>

  $(document).ready(function() {

    // When the product_item is selected

    

  });



  $(".menu > ul > li").click(function(e) {

    // Remove the 'active' class from other menu items

    $(this).siblings().removeClass("active");

    // Toggle the 'active' class on the clicked menu item

    $(this).toggleClass("active");

    // Toggle the visibility of the submenu

    $(this).find("ul").slideToggle();

    // Close other submenus if they are open

    $(this).siblings().find("ul").slideUp();

    // Remove the 'active' class from submenu items

    $(this).siblings().find("ul").find("li").removeClass("active");

  });



  $(".menu-btn").click(function() {

    // Toggle the 'active' class on the sidebar

    $(".sidebar").toggleClass("active");

  });

</script>



<script>

  $(document).ready(function() {
      let itemCounter = 1;
      let unitCounter = 1;
      var sectionCount = 1;

      Add_section(sectionCount);

      function Add_section(sectionCount) {
          get_product_type(sectionCount, itemCounter);
          let itemCount = 1;

          let sectionHtml = `<div class="addSectionDiv" id="section_${sectionCount}">
                              <div class="newsection">
                                  <div class="d-flex align-items-end justify-content-between">
                                      <div class="w-100 me-3">
                                          <label for="SectionNameInput" class="form-label mb-1">Section Name</label>
                                          <input type="text" name="section_name[${sectionCount}]" class="form-control w-100" id="SectionNameInput" required>
                                      </div>
                                      <button class="icon-btn m-0 delete-section" data-section-id="${sectionCount}">
                                          <i class="bi bi-trash3"></i>
                                      </button>
                                  </div>
                                  <div class="table-responsive mt-3">
                                      <table class="table">
                                          <thead>
                                              <tr>
                                                  <th style="border-top-left-radius: 6px; border-bottom-left-radius: 6px;" scope="col">Name</th>
                                                  <th scope="col">Product Code</th>
                                                  <th scope="col">Qty</th>
                                                  <th scope="col">Unit</th>
                                                  <th scope="col">Price</th>
                                                  
                                                  <th scope="col">Total</th>
                                                  <th style="border-top-right-radius: 6px; border-bottom-right-radius: 6px; width: 160px !important;" scope="col">
                                                      <p class="secondary-btn addBtn m-0 p-0" data-section-id="${sectionCount}" style="font-size: 14px !important; width: 105px;">+ Add Items</p>
                                                  </th>
                                              </tr>
                                          </thead>
                                          <tbody class="item-list">
                                              <tr>
                                                  <td><input type="text" class="form-control max-w-166" placeholder="Item Name" name="item_name[${sectionCount}][${itemCount}]" required></td>
                                                  <td>
                                                      <select class="select2 form-select w-100 max-w-166" name="product_item[${sectionCount}][${itemCount}]" id="itemProduct_${sectionCount}_${itemCount}">
                                                      </select>
                                                  </td>
                                                  <td><input type="number" class="form-control max-w-166" name="item_qty[${sectionCount}][${itemCount}]" id="itemQty_${sectionCount}_${itemCount}" placeholder="Quantity" value="1" min="1" max="100"></td>
                                                  <td>
                                                      <select class="form-select w-100 max-w-166" name="item_unit[${sectionCount}][${itemCount}]" id="item_unit_${sectionCount}_${itemCount}">
                                                          <option selected>Select</option>
                                                      </select>
                                                  </td>
                                                  <td><input type="number" class="form-control max-w-166" name="item_price[${sectionCount}][${itemCount}]" placeholder="Price" readonly></td>
                                                  <td><input type="text" class="form-control max-w-166" name="item_mrp[${sectionCount}][${itemCount}]" placeholder="Total" readonly></td>
                                                  <td><button class="icon-btn m-0 delete-item"><i class="bi bi-trash3"></i></button></td>
                                                  <td><input type="hidden" class="form-control max-w-166" name="item_discount[${sectionCount}][${itemCount}]" id="itemDiscount_${sectionCount}_${itemCount}" placeholder="Item Discount"></td>
                                              </tr>
                                          </tbody>
                                      </table>
                                  </div>
                              </div>
                          </div>`;

          $('.sectionContainer').append(sectionHtml);
          initializeSelect2();
          itemCount++;
      }

      function initializeSelect2() {
          $('.select2').select2();
      }

      $('.add-section-btn').on('click', function() {
          sectionCount++;
          Add_section(sectionCount);
      });

      $(document).on('click', '.addBtn', function() {
          let sectionId = $(this).data('section-id');
          let itemCount = $('#section_' + sectionId + ' .item-list tr').length + 1;

          let itemRow = `<tr>
                          <td><input type="text" class="form-control max-w-166" placeholder="Item Name" name="item_name[${sectionId}][${itemCount}]"></td>
                          <td>
                              <select class="select2 form-select w-100 max-w-166" name="product_item[${sectionId}][${itemCount}]" id="itemProduct_${sectionId}_${itemCount}">
                              </select>
                          </td>
                          <td><input type="number" class="form-control max-w-166" name="item_qty[${sectionId}][${itemCount}]" id="itemQty_${sectionId}_${itemCount}" placeholder="Quantity" value="1" min="1" max="100"></td>
                          <td>
                              <select class="form-select w-100 max-w-166" name="item_unit[${sectionId}][${itemCount}]" id="item_unit_${sectionId}_${itemCount}">
                                  <option selected>Select</option>
                              </select>
                          </td>
                          <td><input type="number" class="form-control max-w-166" name="item_price[${sectionId}][${itemCount}]" placeholder="Price" readonly></td>
                          <td><input type="number" class="form-control max-w-166" name="item_mrp[${sectionId}][${itemCount}]" placeholder="Total" readonly></td>
                          <td><button class="icon-btn m-0 delete-item"><i class="bi bi-trash3"></i></button></td>
                          <td><input type="hidden" class="form-control max-w-166" name="item_discount[${sectionId}][${itemCount}]" id="itemDiscount_${sectionId}_${itemCount}" placeholder="Item Discount"></td>
                      </tr>`;

          $('#section_' + sectionId + ' .item-list').append(itemRow);
          get_product_type(sectionId, itemCount);
          initializeSelect2();
      });

      $(document).on('click', '.delete-section', function() {
          let sectionId = $(this).data('section-id');
          $('#section_' + sectionId).remove();
      });

      $(document).on('click', '.delete-item', function() {
          $(this).closest('tr').remove();
      });

      function get_product_type(sectionId, itemCount) {
          $.ajax({
              type: "GET",
              url: "{{url('getProduct')}}",
              contentType: "application/json; charset=utf-8",
              dataType: "json",
              success: function(result) {
                  let htmlProductType = `<option disabled selected>Select Item</option>`;
                  result.forEach(function(item) {
                      htmlProductType += `<option value="${item.id}" data-unit="${item.product_type.product_unit}" data-price="${item.supplier_price}" data-mrp="${item.mrp}" data-profit="${item.profit_percentage}" data-gst_percentage="${item.gst_percentage}">${item.tally_code}</option>`;
                  });
                  $("#itemProduct_" + sectionId + "_" + itemCount).html(htmlProductType);
              }
          });
      }

      $(document).on('change', '[id^="itemProduct_"]', function() {
          let sectionId = $(this).attr('id').split('_')[1];
          let itemCount = $(this).attr('id').split('_')[2];
          
          let selectedProductId = $(this).val();
          let $selectedOption = $("#itemProduct_" + sectionId + "_" + itemCount + " option[value='" + selectedProductId + "']");
          
          let productUnit = $selectedOption.data('unit');
          let mrp = parseFloat($selectedOption.data('mrp')) || 0;
          let gst_percent = parseFloat($selectedOption.data('gst_percentage')) || 0;

          $("input[name='item_price[" + sectionId + "][" + itemCount + "]']").val(mrp.toFixed(2));
          $("input[name='item_qty[" + sectionId + "][" + itemCount + "]']").val(1);
          $("input[name='item_discount[" + sectionId + "][" + itemCount + "]']").val("0");

          // Initial calculation
          // let finalMRP = Math.round(mrp * (1 + gst_percent / 100)).toFixed(2);
          let finalMRP = (mrp * (1 + gst_percent / 100)).toFixed(2);
          $("input[name='item_mrp[" + sectionId + "][" + itemCount + "]']").val(finalMRP);

          if (typeof productUnit === 'string') {
              productUnit = productUnit.split(',');
          }

          let $unitSelect = $("#item_unit_" + sectionId + "_" + itemCount);
          $unitSelect.empty();
          productUnit.forEach(function(unit) {
              $unitSelect.append(`<option value="${unit}">${unit}</option>`);
          });
      });

      $(document).on('input', '[id^="itemQty_"]', function() {
          let $this = $(this);
          let sectionId = $this.attr('id').split('_')[1];
          let itemCount = $this.attr('id').split('_')[2];
          
          let inputValue = $this.val().replace(/[^0-9]/g, '');
          $this.val(inputValue);
          
          // Trigger discount recalculation
          $("#itemDiscount_" + sectionId + "_" + itemCount).trigger('input');
      });

      $(document).on('input', '[id^="itemDiscount_"]', function() {
      let $this = $(this);
      let sectionId = $this.attr('id').split('_')[1];
      let itemCount = $this.attr('id').split('_')[2];
      
      let inputValue = $this.val().replace(/[^0-9]/g, '');
      $this.val(inputValue);

      let $select = $("#itemProduct_" + sectionId + "_" + itemCount);
      let selectedProductId = $select.val();
      let $selectedOption = $select.find("option[value='" + selectedProductId + "']");
      
      if (!$selectedOption.length) return;

      let mrp = parseFloat($selectedOption.data('mrp')) || 0;
      let gst_percent = parseFloat($selectedOption.data('gst_percentage')) || 0;
      
      let qty = parseFloat($("input[name='item_qty[" + sectionId + "][" + itemCount + "]']").val()) || 1;
      let discount = parseFloat(inputValue) || 0;

      let baseAmount = mrp * qty;
      let discountAmount = baseAmount * (discount / 100);
      let amountAfterDiscount = baseAmount - discountAmount;
      let gstAmount = amountAfterDiscount * (gst_percent / 100);
      let finalAmount = amountAfterDiscount + gstAmount;

      // $("input[name='item_mrp[" + sectionId + "][" + itemCount + "]']").val(Math.round(finalAmount));
      $("input[name='item_mrp[" + sectionId + "][" + itemCount + "]']").val(finalAmount.toFixed(2));
  });

  initializeSelect2();
  });
</script>
<script src="https://unpkg.com/@phosphor-icons/web"></script>

<script>
  document.getElementById('gst_uin').addEventListener('blur', function () {
    const gstInput = this.value.trim().toUpperCase();
    const gstRegex = /^[0-9]{2}[A-Z]{5}[0-9]{4}[A-Z]{1}[1-9A-Z]{1}Z[0-9A-Z]{1}$/;
    const errorBox = document.getElementById('gst_error');

    if (gstInput === '') {
      // Optional field: empty is allowed
      errorBox.style.display = 'none';
      this.classList.remove('is-invalid');
    } else if (!gstRegex.test(gstInput)) {
      // Show error if not valid
      errorBox.style.display = 'block';
      this.classList.add('is-invalid');
    } else {
      // Valid GSTIN
      errorBox.style.display = 'none';
      this.classList.remove('is-invalid');
    }
  });
</script>
<script>
  // Delegate event because rows might be dynamically added
  $(document).on('input', '[id^="itemQty_"], [id^="itemPrice_"]', function() {
      let input = $(this);
      
      // Extract section and item count from ID
      let idParts = input.attr('id').split('_');
      let sectionCount = idParts[1];
      let itemCount = idParts[2];

      let qty = parseFloat($(`#itemQty_${sectionCount}_${itemCount}`).val()) || 0;
      let price = parseFloat($(`#itemPrice_${sectionCount}_${itemCount}`).val()) || 0;

      let total = qty * price;

      // Set total in readonly MRP field
      $(`input[name="item_mrp[${sectionCount}][${itemCount}]"]`).val(total.toFixed(2));
  });
</script>

<script>
  
  $(function() {
      $("#date").datepicker({
          dateFormat: "dd-mm-yy"
      });
  });
</script>
<script>
  flatpickr("#biddate", {
      dateFormat: "m-d-Y" // mm-dd-yyyy
  });
</script>
@endsection