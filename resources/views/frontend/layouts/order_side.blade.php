<div class="col-md-3">
    <div class="box" id="order-summary">
        <div class="box-header">
            <h3>Order summary</h3>
        </div>
        <p class="text-muted">Shipping and additional costs are calculated based on the values you have entered.</p>

        <div class="table-responsive">
            <table class="table">
                <tbody>
                <tr>
                    <td>Order subtotal</td>
                    <th>₦{{Cart::subtotal()}}</th>
                </tr>
                <tr>
                    <td>Shipping and handling</td>
                    <th>₦0.00</th>
                </tr>
                <tr>
                    <td>Tax</td>
                    <th>₦0.00</th>
                </tr>
                <tr class="total">
                    <td>Total</td>
                    <th>₦{{Cart::total()}}</th>
                </tr>
                </tbody>
            </table>
        </div>

    </div>

</div>



