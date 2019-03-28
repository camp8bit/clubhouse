export interface Post {
  id: number
  author: string
  content: string
  createdAt: Date
  replies?: Array<Post>
}
