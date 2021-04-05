<template>
    <lit-col class="mb-3">
        <!-- <h5 v-html="states[model.payment_state]" class="mb-4" /> -->

        <table class="w-100">
            <tr>
                <td class="col-sm pl-0 pr-2 pb-2">Subtotal</td>
                <td class="text-secondary pb-2">
                    {{ model.products_count }}
                    {{ model.products_count == 1 ? "Products" : "Products" }}
                </td>
                <td align="right" class="pb-2 lit-col-money">
                    {{ model.readable_subtotal }}
                </td>
            </tr>

            <tr class="">
                <td class="col-sm pl-0 pr-2 pb-2">Shipping</td>
                <td class="text-secondary pb-2"></td>
                <td align="right" class="pb-2 lit-col-money">
                    {{ model.readable_shipping_price }}
                </td>
            </tr>

            <tr class="mt-5">
                <td class="col-sm pl-0 pr-2 pb-2 pt-2"></td>
                <td></td>
                <td align="right" class="pb-2 pt-2 lit-col-money">
                    <strong class="mr-2">Total</strong>
                    <strong>
                        {{ model.readable_amount }}
                    </strong>
                </td>
            </tr>
        </table>

        <hr class="w-100" />
        <div class="d-flex justify-content-between w-100">
            <span>Paid by customer</span>
            <span class="lit-col-money">
                {{
                    model.state == "successfull"
                        ? model.readable_amount
                        : "0,00 €"
                }}
            </span>
        </div>
    </lit-col>
</template>

<script>
export default {
    name: "BookingPaymentInfo",
    props: ["model", "states"]
};
</script>

<style></style>
