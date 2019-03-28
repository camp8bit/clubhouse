import PostList from './src/post-list'

import { actions, store } from './src/state'
import { h, render, Component } from 'preact'
import { Post } from './src/interfaces'
import { Provider, connect } from 'unistore/full/preact'

import './style.less'

/* @jsx h */

const Header = () => <header><b>🏠</b> <span>Clubhouse</span></header>

interface Props {
  count?: number,
  increment?: any,
  decrement?: any
}

@connect('count', actions)
class App extends Component<Props, any> {
  render () {
    return (
      <div>
        <Header />

        <section>
          <PostList />
        </section>
      </div>
    )
  }
}

render((
  <Provider store={store}>
    <App />
  </Provider>
), document.body)
