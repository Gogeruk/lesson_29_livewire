<div class="m-3 border border-primary">
    <h1 class="text-center">Convert currencies</h1>
    <div class="m-4">

        <!--  FORM  -->
        <form wire:submit.prevent="convert" class="mb-4">
            <div class="row">
                <div class="col-sm col-md-3 col-lg-2">
                    <div class="form-group">
                        <label for="cur_code_1">From</label>
                        <input wire:model="first_currency_code" type="text" id="cur_code_1" name="cur_code_1" class="form-control" placeholder="CUR_CODE">
                    </div>
                </div>
                <div class="col-sm col-md-3 col-lg-2">
                    <div class="form-group">
                        <label for="cur_code_3">To</label>
                        <input wire:model="second_currency_code" type="text" id="cur_code_2" name="cur_code_2" class="form-control" placeholder="CUR_CODE">
                    </div>
                </div>
                <div class="col-sm col-md-6 col-lg-4">
                    <div class="form-group">
                        <label for="cur_amount">Amount</label>
                        <input wire:model="amount" type="text" id="cur_amount" name="cur_amount" class="form-control" placeholder="1">
                    </div>
                </div>
                <div class="col-sm-3 m-12">
                    <div class="form-group m-3">
                        <button wire:click="convert" class="btn btn-primary" type="button" name="button">Convert</button>
                    </div>
                </div>
            </div>
        </form>

        <!-- DISPLAY   -->
        <div class="mb-12">
            @if(!empty($errors->all()))
                <div class="alert alert-secondary" role="alert">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </div>
            @endif
            <p>{{ $result }}</p>
        </div>
    </div>
</div>
