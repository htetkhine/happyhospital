<template>
    <section :style="images">
        <div class="container">
            <div class="row">
                <div class="col-12">
                   <h1>{{sub_title1}} <br> {{sub_title2}}</h1>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        },
        data() {
            return {
                images:{backgroundImage:"url(/images/home-banner.jpg)",backgroundSize:"cover",backgroundPosition:"center",backgroundRepeat:"no-repeat",height:"500px"},  
                sub_title1 : 'ယုံကြည်ရသည့်သင့်ရဲ့',
                sub_title2 : 'ကျန်းမာရေးစောင့်ရှောက်မှု'              
            }
            
        }
    }
</script>


