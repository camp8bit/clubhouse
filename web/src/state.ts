import { createStore, Provider } from 'unistore/full/preact'
import { Post } from './interfaces'

const USER = 'Ben'
let maxId = 10

export interface State {
  count: number
  posts: Array<Post>
}

export const store = createStore<State>({ 
  count: 0,
  posts: [
    { id: 1, author: 'Ben', content: 'lol hi2u', createdAt: new Date(), replies: [
      { id: 4, author: 'Sam', content: 'back 2 u', createdAt: new Date() },
      { id: 5, author: 'Wayne-o', content: 'no u', createdAt: new Date() },
      { id: 6, author: 'Mary', content: 'haha asl', createdAt: new Date() },
    ] },
    { id: 2, author: 'Sam', content: 'omg hax', createdAt: new Date(), replies: [] },
    { id: 3, author: 'Mary', content: 'wtf dogs', createdAt: new Date(), replies: [] },
  ]
})

export const actions = (store) => ({
  increment (state: State) {
    return { count: state.count + 1 }
  },

  decrement (state: State) {
    return { count: state.count - 1 }
  },

  postReply (state: State, post: Post, content: string) {
    if (!content) {
      // dont allow empty posts
      return {}
    }

    let posts = state.posts.map(p => {
      if (p.id == post.id) {
        p.replies.push({
          id: maxId++,
          content,
          author: USER,
          createdAt: new Date()
        })
      }

      return p
    })

    return { posts }
  }
})
