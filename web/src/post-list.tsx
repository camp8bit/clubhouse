import { h, render, Component } from 'preact'
import { connect } from 'unistore/full/preact'
import { Post } from './interfaces'
import PostDetail from './post-detail'

/* @jsx h */

interface Props {
  posts?: Array<Post>
}

@connect('posts')
export default class PostList extends Component<Props, any> {
  render () {
    const posts = this.props.posts.map(p => <PostDetail post={p} />)
    return (
      <div>
        { posts }
      </div>
    )
  }
}

