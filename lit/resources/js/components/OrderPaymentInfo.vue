<template>
    <lit-col class="mb-3">
        <!-- <h5 v-html="states[model.payment_state]" class="mb-4" /> -->

        <table class="w-100">
            <tr>
                <td class="col-sm pl-0 pr-2 pb-2">Subtotal</td>
                <td class="text-secondary pb-2">
                    {{ model.products.length }}
                    {{ model.products.length == 1 ? "Ticket" : "Tickets" }}
                </td>
                <td align="right" class="pb-2 lit-col-money">
                    {{ model.readable_subtotal }}
                </td>
            </tr>

            <!-- <tr class="" v-for="(discount, key) in model.discounts">
                <td
                    class="col-sm pl-0 pr-2"
                    :class="key == model.discounts.length - 1 ? 'pb-2' : ''"
                >
                    {{ key == 0 ? "Aktionen" : "" }}
                </td>
                <td
                    class="text-secondary"
                    :class="key == model.discounts.length - 1 ? 'pb-2' : ''"
                >
                    {{ discount.title }}
                </td>
                <td
                    align="right"
                    class="lit-col-money"
                    :class="key == model.discounts.length - 1 ? 'pb-2' : ''"
                >
                    -{{ discount.pivot.readable_credit }}
                </td>
            </tr> -->

            <tr class="" v-if="model.voucher">
                <td class="col-sm pl-0 pr-2 pb-2">Rabatt Code</td>
                <td class="text-secondary pb-2">
                    {{ model.voucher.code }}
                </td>
                <td align="right" class="pb-2 lit-col-money">
                    -{{ model.readable_voucher_credit }}
                </td>
            </tr>

            <tr class="mt-5">
                <td class="col-sm pl-0 pr-2 pb-2 pt-2">
                    <strong>Total</strong>
                </td>
                <td></td>
                <td align="right" class="pb-2 pt-2 lit-col-money">
                    <strong>
                        {{ model.readable_amount }}
                    </strong>
                </td>
            </tr>
        </table>

        <hr class="w-100" />
        <div class="d-flex justify-content-between w-100">
            <span>Vom Kunden Bezahlt</span>
            <span class="lit-col-money">
                {{ model.readable_paid_amount }}
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
