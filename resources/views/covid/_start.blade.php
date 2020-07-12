<div class="card">
    <div class="card-body">
        <h4 class="font-weight-bold">Covid-19 Package</h4>
        <p>Home Isolation Support program for COVID-19 Positive Patients For 14 Days.</p>
        
        <form action="/covid" method="POST">
            @csrf
            <input type="hidden" name="is_positive" value="1">
            <button type="submit" class="btn btn-primary">I'm Positive</button>
            <button type="submit" class="btn btn-warning text-white ml-2">I'm Negative (Close Contact with Positive Patient)</button>
        </form>
    </div>
</div>