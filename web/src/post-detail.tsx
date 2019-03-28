import { h, render, Component } from 'preact'
import { connect } from 'unistore/full/preact'
import { Post } from './interfaces'
import { actions } from './state'

/* @jsx h */

const Reply = (props) => {
  const reply: Post = props.reply

  return <div>{ reply.content }</div>
}

interface Props {
  post?: Post
  postReply?: Function
}

@connect('posts', actions)
export default class PostDetail extends Component<Props, any> {
  toggleReplies () {
    this.setState({ replies: !this.state.replies })
  }

  focus (textarea) {
    textarea.style.height = '64px'
    this.setState({ replies: true })
  }

  blur (textarea) {
    textarea.style.height = ''
  }

  keypress (e, key) {
    if (key === 13) {
      e.preventDefault()
      e.target.blur()

      this.submit()

      this.setState({ content: '' })
    }
  }

  submit () {
    this.props.postReply(this.props.post, this.state.content)
  }

  render () {
    let replies = null

    if (this.state.replies) {
      replies = <div className='replies'>{ this.props.post.replies.map(r => <Reply reply={r} />) }</div>
    } else {
      replies = <p className='meta'><a href='#' onClick={() => this.toggleReplies()}>{ this.props.post.replies.length } replies</a></p>      
    }

    return (
      <div className='post'>
        <h3>{ this.props.post.author }</h3>

        <div className='content'>{ this.props.post.content }</div>

        <p className='meta'>{ this.props.post.createdAt.toString().replace(/\S+\+.+/, '') }</p>        

        { replies }

        <form>
          <textarea 
            placeholder='Reply...' 
            value={this.state.content}
            onFocus={e => this.focus(e.currentTarget) }
            onBlur={e => this.blur(e.currentTarget) }
            onInput={e => this.setState({ content: e.currentTarget['value'] })}
            onKeyPress={e => this.keypress(e, e.keyCode) }
            />
        </form>
      </div>
    )
  }
}

