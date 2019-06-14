<template>
    <div class="Counter">
        <div class="Counter__icon">
            <i :class="icon"></i>
        </div>
        <div class="Counter__number">{{counted}}</div>
        <h5 class="Counter__text">{{text}}</h5>
    </div>
</template>

<script>
    export default{
        props: {
            number: Number,
            text: String,
            icon: String,
            increment: Number
        },
        data() {
            return {
                counted: 0,
            }
        },
        mounted(){
            let interval = this.calculateInterval();
            let increment = parseInt(this.increment);
            this.number = parseInt(this.number);

            Event.listen('fire-counters', () => {
                setInterval(() => this.incrementing(increment), interval);
            });
        },
        methods: {
            incrementing(inc){
                if(this.counted < this.number) {
                    if(!inc) {
                        inc = 1
                    }
                    if (inc != 1) {
                        inc = this.calculateIncrements(inc)
                    };
                    this.counted = this.counted + inc;
                }
            },
            calculateIncrements(inc) {
                if (this.number < this.counted + inc) {
                    inc = Math.round(inc / 2);
                    if (this.number < this.counted + inc) {
                        inc = Math.round(inc / 2);
                        if (this.number < this.counted + inc) {
                            inc = Math.round(inc / 2);
                            if (this.number < this.counted + inc) {
                                inc = Math.round(inc / 2);
                                if (this.number < this.counted + inc) {
                                    inc = 1;
                                };
                            };
                        };
                    };
                };
                return inc;
            },
            calculateInterval() {
                return Config.counters.duration / this.number;
            }
        }
    }
</script>
