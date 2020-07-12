<h4 class="font-weight-bold mb-3">Report Daily Vitals</h4>

<div class="card">
    <div class="card-body">
        <form  method="POST" action="/covid/vitals">
            @csrf
            <div class="form-group">
                <label for="temperature">Temperature (in &deg; C)</label>
                <input type="number" step="0.1" name="temperature" id="temperature" class="form-control">
            </div>
            <div class="form-group">
                <label for="oxygen">Oxygen Saturation</label>
                <input type="number" step="0.1" name="oxygen" id="oxygen" class="form-control">
            </div>
            <div class="form-group">
                <label for="pulse_rate">Pulse Rate</label>
                <input type="number" step="0.1" name="pulse_rate" id="pulse_rate" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary btn-block">Record Vitals</button>
        </form>
    </div>
</div>