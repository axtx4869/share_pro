<template>
    <div class="flex">
        <button type="button" class="p-1" style="outline: none">
            <i
                class="fas fa-thumbs-up text-2xl"
                :class="[this.isLiked ? 'text-blue-600' : 'text-gray-300 hover:text-gray-200']"
                @click="clickLike"
            />
        </button>
        <p class="text-gray-900 grid place-items-center p-1">
        {{ countLikes }}
        </p>
    </div>
</template>

<script>
export default {
    props: {
        initialIsLiked: {
            type: Boolean,
            default: false
        },
        initialCountLikes: {
            type: Number,
            default: 0
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
            isLiked: this.initialIsLiked,
            countLikes: this.initialCountLikes
        };
    },
    methods: {
        clickLike() {
            if (!this.authorized) {
                alert("いいね機能はログイン中のみ使用できます");
                return;
            }
            console.log(this.authorized);
            this.isLiked ? this.dislike() : this.like();
        },
        async like() {
            const response = await axios.put(this.endpoint);
            this.isLiked = true;
            this.countLikes = response.data.countLikes;
        },
        async dislike() {
            const response = await axios.delete(this.endpoint);
            this.isLiked = false;
            this.countLikes = response.data.countLikes;
        }
    }
};
</script>
