<template>
    <div>
        <button
            class="shadow-none focus:outline-none p-2"
            :class="buttonColor"
            @click="clickFollow"
        >
            <i class="mr-1" :class="buttonIcon"></i>
            {{ buttonText }}
        </button>
    </div>
</template>

<script>
export default {
    props: {
        initialIsFollowed: {
            type: Boolean,
            default: false
        },
        authorized: {
            type: Boolean,
            default: false
        },
        endpoint: {
            type: String
        }
    },
    data() {
        return {
            isFollowed: this.initialIsFollowed
        };
    },
    computed: {
        buttonColor() {
            return this.isFollowed ? "bg-green-500 duration-500 hover:bg-green-400 text-white" : "bg-white border-black border-2 hover:bg-green-500 hover:border-0 hover:text-white";
        },
        buttonIcon() {
            return this.isFollowed ? "fas fa-user-check" : "fas fa-user-plus";
        },
        buttonText() {
            return this.isFollowed ? "フォロー中" : "フォロー";
        }
    },
    methods: {
        clickFollow() {
            if (!this.authorized) {
                alert("フォロー機能はログイン中のみ使用できます");
                return;
            }

            this.isFollowed ? this.unfollow() : this.follow();
        },
        async follow() {
            const response = await axios.put(this.endpoint);

            this.isFollowed = true;
        },
        async unfollow() {
            const response = await axios.delete(this.endpoint);

            this.isFollowed = false;
        }
    }
};
</script>
