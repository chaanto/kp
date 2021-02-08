
<?php $__env->startSection('title', 'Detail Journal'); ?>

<?php $__env->startSection('contents'); ?>
<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-7 align-self-center">
                <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Detail Journal</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 p-0">
                            <li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>" class="text-muted">Home</a></li>
                            <li class="breadcrumb-item"><a href="<?php echo e(route('jurnals.index')); ?>"
                                    class="text-muted">Journal</a></li>
                            <li class="breadcrumb-item text-muted active" aria-current="page">Detail</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <h4>Information</h4>
                            <hr>
                            <div class="row">
                                <div class="col-6">
                                    <div>
                                        <h6>Jurnals Number:</h6>
                                        <p><?php echo e($jurnal->transaction_no); ?></p>
                                    </div>
                                    <div>
                                        <h6>Date:</h6>
                                        <p><?php echo e($jurnal->transaction_date); ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
                <div class="card mt-4">
                   
                    <div class="card-body">
                        <div class="form-group">
                            <table class="w-100" id="product_table">
                                <tr>
                                    <th class="d-none">No</th>
                                    <th class="w-25">Akun</th>
                                    <th class="w-25">Details</th>
                                    <th class="w-25">Debit</th>
                                    <th class="w-25">Credit</th>
                                    <th></th>
                                </tr>
                                <tr>
                                    <td class="d-none">1</td>
                                    <td>
                                        <select disabled
                                            class="form-control border-0 akun-select2 select2 <?php if(false): ?> is-invalid <?php endif; ?>"
                                            id="akun_id_0" name="akuns[0][akun_id]">
                                        </select>
                                    </td>
                                    <td>
                                        <input class="form-control description" type="text" id="description_0"
                                            name="akuns[0][description]" readonly/>
                                    </td>
                                    <td>
                                        <input class="form-control debit" type="number" min="0" value="0" id="debit_0"
                                            name="akuns[0][debit]" onchange="calculatePrice()" readonly/>
                                    </td>
                                    <td>
                                        <input class="form-control credit" type="number" min="0" value="0" id="credit_0"
                                            name="akuns[0][credit]" onchange="calculatePrice()"readonly />
                                    </td>
                                   
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="col-12">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="total_debit">Total Debit</label>
                                <input type="text" class="form-control <?php $__errorArgs = ['total_debit'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                    id="total_debit" name="total_debit"
                                    value="<?php echo e(isset($jurnal) ? $jurnal['total_debit'] : (old('total_debit') ? old('total_debit') : 0)); ?>"
                                    readonly>
                                <?php $__errorArgs = ['total_debit'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback">
                                    <?php echo e($message); ?>

                                </div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="total_credit">Total Credit</label>
                                <input type="text" class="form-control <?php $__errorArgs = ['total_credit'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                    id="total_credit" name="total_credit"
                                    value="<?php echo e(isset($jurnal) ? $jurnal['total_credit'] : (old('total_credit') ? old('total_credit') : 0)); ?>"
                                    readonly>
                                <?php $__errorArgs = ['total_credit'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback">
                                    <?php echo e($message); ?>

                                </div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>
                    </div>

                </div>
                <a href="<?php echo e(route('jurnals.index')); ?>" type="button" class="btn btn-secondary btn-rounded mr-2">Back</a>
            </div>
        </div>
    </div>
</div>
</div>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('scripts'); ?>
<script type="text/javascript">
		function calculatePrice(){
			let totalDebit = $('#total_debit');
			let totalCredit = $('#total_credit');

			let debit = $('.debit');
			let calculatedDebit = 0;
			for (var i = 0; i < debit.length; i++) {
				let debitTotal = debit[i].value;
				calculatedDebit += parseInt(debitTotal);   
			}

			let credit = $('.credit');
			let calculatedCredit = 0;
			for (var i = 0; i < credit.length; i++) {
				let creditTotal = credit[i].value;
				calculatedCredit += parseInt(creditTotal);   
			}

			totalDebit.val(calculatedDebit);
			totalCredit.val(calculatedCredit)
		}

	$(function(){

		
		function addProductRow(data = null) {
			let oldRow = $("#product_table tr:last-child").first();
			let newRow = oldRow.clone();
			let curRowNum = newRow.find("td:first-child").html();
			newRow.find("td:first-child").html((parseInt(curRowNum) + 1));
			let newSelect2 = newRow.find("select.akun-select2");
			newSelect2.attr("id", "akun_id_"+curRowNum)
				.attr("name", "akuns["+curRowNum+"][akun_id]")
				.removeClass("select2-hidden-accessible")
				.attr("data-select2-id", null)
				.attr("tabindex", null)
				.attr("aria-hidden", null)
				.empty()
				.clone();
			newRow.find("td:nth-child(2)").first().html(newSelect2);
			newRow.find("td:nth-child(3) input").attr("id", "description_"+curRowNum)
        		.attr("name", "akuns["+curRowNum+"][description]")
				.val();
			newRow.find("td:nth-child(4) input").attr("id", "debit_"+curRowNum)
				.attr("name", "akuns["+curRowNum+"][debit]")
				.val(0);
			newRow.find("td:nth-child(5) input").attr("id", "credit_"+curRowNum)
				.attr("name", "akuns["+curRowNum+"][credit]")
				.val(0);
			$("#product_table").append(newRow);
				newSelect2.select2({
					placeholder: "Search for Akun",
					ajax: {
						url: "<?php echo e(route('akun-select')); ?>",
						dataType: 'json',
						delay: 250,
						data: function(params) {
							return {
								q: params.term,
							};
						},
						processResults: function(data) {
							return {
								results: data
							};
						},
						cache: true
					},
					minimumInputLength: 1,
				});
			
			if(data !== null && data.akun !== null) {
				oldRow.find("select.select2").append(
						new Option(
							data.akun.name,
							data.akun.id,
							false,
							false,
						)
					)
				.trigger('change');
			}
			if(data !== null && data.description) {
				oldRow.find("td:nth-child(3) input").val(data.description);
			}
			if(data !== null && data.debit) {
				oldRow.find("td:nth-child(4) input").val(data.debit);
			}
			if(data !== null && data.credit) {
				oldRow.find("td:nth-child(5) input").val(data.credit);
			}
			calculatePrice();
		}
		$(".btn-add-row").on('click', addProductRow);

		$("#akun_id_0").select2({
			placeholder: "Search for Akun",
			ajax: {
				url: "<?php echo e(route('akun-select')); ?>",
				dataType: 'json',
				delay: 250,
				data: function(params) {
					return {
						q: params.term,
					};
				},
				processResults: function(data) {
					return {
						results: data
					};
				},
				cache: true
			},
			minimumInputLength: 1,
		});

		function formatDetail(data) {
			if (data.loading) {
				return data.text;
			}
			let markup = "<div class='select2-result-repository clearfix'>";
					markup += "<div class='select2-result-repository__meta'>";
					markup += "<div class='select2-result-repository__title'>" + data.text + "</div>";
					markup += "</div></div>";
			return markup;
		}
		
		function formatDetailSelection(data) {
			if(data.text) {
				return data.text;
			} else {
				return data.text;
			}
		}



		<?php if(isset($jurnal)): ?>
			let jurnalDetail = null;
			let akun = null;
			<?php $__currentLoopData = $jurnal->jurnalDetail; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<?php
					$akun = App\Models\Akun::find($detail->akun_id);
				?>
				akun = {
					id: '<?php echo e($akun->id); ?>',
					name: '<?php echo e($akun->name); ?>'
				};
				jurnalDetails = {
					detail_id: '<?php echo e($detail->id); ?>',
					akun: akun,
					description: '<?php echo e($detail->description); ?>',
					debit: '<?php echo e($detail->debit); ?>',
					credit: '<?php echo e($detail->credit); ?>',
				};
				addProductRow(jurnalDetails);
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            deletelastRow();
		<?php endif; ?>
		$("#product_table tr:last-child td:last-child button").trigger("click");

        function deletelastRow(event) {
			$('#product_table tr:last').remove();
		}

		<?php if(isset($data)): ?>
		let productData = null;
			<?php $__currentLoopData = $data->product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				productData = {
					name: '<?php echo e($product->name); ?>',
					id: '<?php echo e($product->id); ?>',
					discount_type: <?php echo e($product->pivot->discount_type); ?>,
					discount_value: <?php echo e($product->pivot->discount_value); ?>,
				};
				addProductRow(productData);
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

		$("#product_table tr:last-child td:last-child button").trigger("click");
		<?php elseif(old('akuns')): ?>
			let data = null;
			<?php $__currentLoopData = old('akuns'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $akun): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				data = {
					description: '<?php echo e($akun['description'] ?? ""); ?>',
					debit: <?php echo e($akun['debit'] ?? 0); ?>,
					credit: <?php echo e($akun['credit'] ?? 0); ?>,
				};
					<?php if(isset($akun['akun_id'])): ?>
						<?php
							$productObj = \App\Models\Akun::find($akun['akun_id']);
							$name = "(" .$productObj->code. ") ". $productObj->name;
						?>
						data.name = "<?php echo e($name); ?>";
						data.id = '<?php echo e($productObj->id); ?>';
					<?php endif; ?>
				addProductRow(data);
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

		$("#product_table tr:last-child td:last-child button").trigger("click");
		<?php endif; ?>
		
	})
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.template.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\projectKp\kp\resources\views/jurnal/show.blade.php ENDPATH**/ ?>