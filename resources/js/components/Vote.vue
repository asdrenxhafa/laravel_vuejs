<template>
    <div class="d-fex flex-column vote-controls">
        <a @click.prevent="voteUp" :title="title('up')"
           class="vote-up" :class="classes">
            <i class="fas fa-caret-up fa-3x"></i>
        </a>

        <span class="votes-count">{{ count }}</span>

        <a @click.prevent="voteDown" :title="title('down')"
           class="vote-down" :class="classes">
            <i class="fas fa-caret-down fa-3x"></i>
        </a>

        <favorite v-if="name === 'question'" :question="model"></favorite>
        <accept v-else :answer="model"></accept>
    </div>
</template>

<script>
import Favorite from './Favorite.vue';
import Accept from './Accept.vue';
export default {
    props: ['name', 'model'],
    computed: {
        classes () {
            return this.signedIn ? '' : 'off';
        },
        endpoint () {
            return `/${this.name}s/${this.id}/vote`;
        }
    },
    components: {
        Favorite,
        Accept
    },
    data () {
        return {
            count: this.model.votes_count,
            id: this.model.id
        }
    },
    methods: {
        title (voteType) {
            let titles = {
                up: `This ${this.name} is useful`,
                down: `This ${this.name} is not useful`
            };
            return titles[voteType];
        },
        voteUp () {
            this._vote(1);
        },
        voteDown () {
            this._vote(-1);
        },
        _vote (vote) {
            if (! this.signedIn) {
                alert(`Please login to vote the ${this.name}`);
            }
            axios.post(this.endpoint, { vote })
                .then(res => {
                    alert(res.data.message);
                    this.count = res.data.votesCount;
                })
        }
    }
}
</script>
