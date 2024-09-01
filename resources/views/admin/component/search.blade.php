<div class="card">
    <form action="{{  route($route) }}"  method="GET" novalidate>
        <div class="row" style="padding: 20px 10px 0px 10px;"> 
            
            <div class="col-lg-11 col-md-11 col-sm-6"> 
                <div class="mb-3">
                    <input type="text" class="form-control" id="validationCustom01" placeholder="Name" name="keyword" value="{{ isset($request) ? $request->get('keyword') : '' }}">
                </div>
            </div>
            <div class="col-lg-1 col-md-1 col-sm-6"> 
                <button class="btn btn-primary" type="submit">Search</button>
            </div>
        </div>
    </form>
</div>