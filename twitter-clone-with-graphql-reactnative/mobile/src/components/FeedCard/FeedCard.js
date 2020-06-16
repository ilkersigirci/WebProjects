import React from 'react';
import styled from 'styled-components/native';
import { graphql, gql } from 'react-apollo';
import Placeholder from 'rn-placeholder';

import FeedCardHeader from './FeedCardHeader';
import FeedCardBottom from './FeedCardBottom';
import FAVORITE_TWEET_MUTATION from '../../graphql/mutations/favoriteTweet';

const Root = styled.View`
  minHeight: 180;
  backgroundColor: ${props => props.theme.WHITE};
  width: 100%;
  padding: 7px;
  shadowColor: ${props => props.theme.SECONDARY};
  shadowOffset: 0px 2px;
  shadowRadius: 2;
  shadowOpacity: 0.1;
  marginVertical: 5;
`;

const CardContentContainer = styled.View`
  flex: 1;
  padding: 10px 20px 10px 0px;
`;

const CardContentText = styled.Text`
  fontSize: 14;
  textAlign: left;
  fontWeight: 500;
  color: ${props => props.theme.SECONDARY};
`;

const Wrapper = styled.View`flex: 1`;

function FeedCard({
  text,
  user,
  createdAt,
  favoriteCount,
  favorite,
  isFavorited,
  placeholder,
  isLoaded
}) {
  if (placeholder) {
    return (
      <Root>
        <Placeholder.ImageContent
          onReady={!isLoaded}
          lineNumber={2}
          animate="shine"
          lastLineWidth="40%"
        >
          <Wrapper />
        </Placeholder.ImageContent>
      </Root>
    )
  }

  return (
    <Root>
      <FeedCardHeader {...user} createdAt={createdAt} />
      <CardContentContainer>
        <CardContentText>
          {text}
        </CardContentText>
      </CardContentContainer>
      <FeedCardBottom
        isFavorited={isFavorited}
        favoriteCount={favoriteCount}
        onFavoritePress={favorite}
      />
    </Root>
  );
}

FeedCard.fragments = {
  tweet: gql`
    fragment FeedCard on Tweet {
      text
      _id
      createdAt
      isFavorited
      favoriteCount
      user {
        username
        avatar
        lastName
        firstName
      }
    }
  `
}

export default graphql(FAVORITE_TWEET_MUTATION, {
  props: ({ ownProps, mutate }) => ({
    favorite: () =>
      mutate({
        variables: { _id: ownProps._id },
        optimisticResponse: {
          __typename: 'Mutation',
          favoriteTweet: {
            __typename: 'Tweet',
            _id: ownProps._id,
            favoriteCount: ownProps.isFavorited
              ? ownProps.favoriteCount - 1
              : ownProps.favoriteCount + 1,
            isFavorited: !ownProps.isFavorited,
          },
        },
      }),
  }),
})(FeedCard);
