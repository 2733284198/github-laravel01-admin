<section class="vue-number">
    <div class="input-group">
        <span class="input-group-prepend">
{{--            <button type="button" class="btn btn-info" v-on:click="decrement" >-{{ step }}</button>--}}
            <button type="button" class="btn btn-info" v-on:click="decrement" > -1 </button>
        </span>
        <input type="text" class="form-control text-center" :value="value">
        <span class="input-group-append">
{{--            <button type="button" class="btn btn-info" v-on:click="increment">+{{ step }}</button>--}}
            <button type="button" class="btn btn-info" v-on:click="increment">+1 </button>
        </span>
    </div>
</section>

<style>
    .vue-number {
        width: 250px;
    }
</style>


<script require="vuejs">
    new Vue({
        el: ".vue-number",
        data: function() {
            return @json($options);
        },
        methods: {
            increment: function() {
                this.value = Math.min(this.value + this.step, this.max);
            },
            decrement: function() {
                this.value = Math.max(this.value - this.step, this.min);
            }
        }
    });
</script>
